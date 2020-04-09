<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Models\Admin;
use App\Domain\Auth\Requests\AssignRoleRequest;
use App\Domain\Support\ApiController;
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
