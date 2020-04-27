<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Filters\Auth\AdminFilter;
use App\Models\Admin;
use App\Requests\Auth\CreateAdminRequest;
use App\Requests\Auth\UpdateAdminRequest;
use App\Sorts\Auth\AdminSort;
use App\Transformers\Auth\AdminTransformer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class AdminController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Admin::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param AdminFilter $adminFilter
     * @param AdminSort $adminSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, AdminFilter $adminFilter, AdminSort $adminSort)
    {
        return $this->httpOK(Admin::query()->filter($adminFilter)->sortBy($adminSort)->paginate(), AdminTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Admin $admin
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Admin $admin)
    {
        return $this->httpOK($admin, AdminTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAdminRequest $request
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function store(CreateAdminRequest $request)
    {
        $admin = Admin::create($request->validated());
        return $this->httpCreated($admin, AdminTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminRequest $request
     * @param Admin $admin
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Admin $admin
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Admin $admin)
    {
        $admin->delete();
        return $this->httpNoContent();
    }
}
