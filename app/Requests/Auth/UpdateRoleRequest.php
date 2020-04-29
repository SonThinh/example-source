<?php


namespace App\Requests\Auth;


use App\Requests\ApiRequest;

class UpdateRoleRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'filled|unique:roles,name,'.$this->id,
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
