<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Models\Role;
use App\Requests\Auth\SyncPermissionRequest;
use App\Transformers\Auth\PermissionTransformer;
use Illuminate\Http\Request;

class PermissionRoleController extends ApiController
{
    /**
     * Display a listing permissions of the specified resource.
     *
     * @param  Request  $request
     * @param  Role  $role
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, Role $role)
    {
        return $this->httpOK($role->permissions, PermissionTransformer::class);
    }

    /**
     * Create, update or delete permissions of the specified resource.
     *
     * @param  SyncPermissionRequest  $request
     * @param  Role  $role
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function sync(SyncPermissionRequest $request, Role $role)
    {
        $role->permissions()->syncWithoutDetaching($request->validated());
        return $this->httpNoContent();
    }
}
