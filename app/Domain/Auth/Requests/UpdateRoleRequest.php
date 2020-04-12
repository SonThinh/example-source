<?php


namespace App\Domain\Auth\Requests;


use App\Domain\Support\Requests\ApiRequest;

class UpdateRoleRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'filled|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
            'permissions' => 'filled|array',
            'permissions.*' => 'filled|exists:permissions,name',
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }
}
