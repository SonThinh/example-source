<?php


namespace App\Domain\Auth\Requests;


use App\Domain\Support\Requests\ApiRequest;

class CreateRoleRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name'              => 'required|unique:roles,name',
            'display_name'      => 'required|string',
            'description'       => 'required|string',
            'permissions'       => 'exists:permissions,id',
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return false;
    }
}
