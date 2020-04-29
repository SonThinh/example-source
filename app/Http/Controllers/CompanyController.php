<?php


namespace App\Http\Controllers;

use App\Filters\Companies\CompanyFilter;
use App\Models\Company;
use App\Requests\Companies\CreateCompanyRequest;
use App\Requests\Companies\UpdateCompanyRequest;
use App\Sorts\Companies\CompanySort;
use App\Transformers\Companies\CompanyTransformer;
use App\Actions\Companies\CreateCompanyAction;
use App\Actions\Companies\UpdateCompanyAction;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CompanyController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Company::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param CompanyFilter $companyFilter
     * @param CompanySort $companySort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CompanyFilter $companyFilter, CompanySort $companySort)
    {
        return $this->httpOK(Company::query()->filter($companyFilter)->sortBy($companySort)->paginate(), CompanyTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Company $company
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Company $company)
    {
        return $this->httpOK($company, CompanyTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCompanyRequest $request
     * @param CreateCompanyAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateCompanyRequest $request, CreateCompanyAction $action)
    {
        $company = $action->execute($request->validated());
        return $this->httpCreated($company, CompanyTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @param UpdateCompanyAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company, UpdateCompanyAction $action)
    {
        $action->execute($company, $request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Company $company
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Company $company)
    {
        $company->delete();
        return $this->httpNoContent();
    }
}
