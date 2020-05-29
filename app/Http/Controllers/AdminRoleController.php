<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Requests\Auth\AssignRoleRequest;
use Illuminate\Support\Arr;

class AdminRoleController extends ApiController
{
    /**
     * Update the specified resource in storage.
     *
     * @param AssignRoleRequest $request
     * @param Admin $admin
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(AssignRoleRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $admin->syncRoles(Arr::get($data, 'roles', []));
        return $this->httpNoContent();
    }
}
