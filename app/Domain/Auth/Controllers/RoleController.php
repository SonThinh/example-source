<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Actions\CreateRoleAction;
use App\Domain\Auth\Actions\UpdateRoleAction;
use App\Filters\Auth\RoleFilter;
use App\Models\Role;
use App\Requests\Auth\CreateRoleRequest;
use App\Requests\Auth\UpdateRoleRequest;
use App\Sorts\Auth\RoleSort;
use App\Transformers\Auth\RoleTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class RoleController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param \App\Filters\Auth\RoleFilter $roleFilter
     * @param RoleSort $roleSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, RoleFilter $roleFilter, RoleSort $roleSort)
    {
        return $this->httpOK(Role::query()->filter($roleFilter)->sortBy($roleSort)->get(), RoleTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Role $role
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Role $role)
    {
        return $this->httpOK($role, RoleTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRoleRequest $request
     * @param CreateRoleAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateRoleRequest $request, CreateRoleAction $action)
    {
        $role = $action->execute($request->validated());
        return $this->httpCreated($role, RoleTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @param UpdateRoleAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateRoleRequest $request, Role $role, UpdateRoleAction $action)
    {
        $action->execute($role,$request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Role $role
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        return $this->httpNoContent();
    }
}
