<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Filters\AdminFilter;
use App\Domain\Auth\Models\Admin;
use App\Domain\Auth\Requests\CreateAdminRequest;
use App\Domain\Auth\Requests\UpdateAdminRequest;
use App\Domain\Auth\Transformers\AdminTransformer;
use App\Domain\Support\ApiController;
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
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, AdminFilter $adminFilter)
    {
        return $this->httpOK(Admin::query()->filter($adminFilter)->paginate(), AdminTransformer::class);
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
