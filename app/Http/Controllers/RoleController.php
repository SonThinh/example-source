<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Actions\Auth\CreateRoleAction;
use App\Actions\Auth\UpdateRoleAction;
use App\Domain\Auth\Filters\RoleFilter;
use App\Domain\Auth\Models\Role;
use App\Domain\Auth\Requests\CreateRoleRequest;
use App\Domain\Auth\Requests\UpdateRoleRequest;
use App\Domain\Auth\Sorts\RoleSort;
use App\Domain\Auth\Transformers\RoleTransformer;
use App\Http\Controllers\ApiController;
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
     * @param \App\Domain\Auth\Filters\RoleFilter $roleFilter
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
