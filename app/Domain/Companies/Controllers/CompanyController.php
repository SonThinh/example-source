<?php


namespace App\Domain\Companies\Controllers;

use App\Domain\Companies\Action\CreateCompanyAction;
use App\Domain\Companies\Action\UpdateCompanyAction;
use App\Domain\Companies\Filters\CompanyFilter;
use App\Domain\Companies\Models\Company;
use App\Domain\Companies\Requests\CreateCompanyRequest;
use App\Domain\Companies\Requests\UpdateCompanyRequest;
use App\Domain\Companies\Transformers\CompanyTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class CompanyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param CompanyFilter $companyFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CompanyFilter $companyFilter)
    {
        return $this->httpOK(Company::query()->filter($companyFilter)->paginate(), CompanyTransformer::class);
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
