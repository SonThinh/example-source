<?php


namespace App\Requests\Auth;


use App\Requests\ApiRequest;

class CreateRoleRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
            'permissions' => 'filled|array',
            'permissions.*' => 'filled|exists:permissions,id',
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
