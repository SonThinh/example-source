<?php


namespace App\Requests\Auth;


use App\Requests\ApiRequest;

class AssignRoleRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'roles' => 'required|array',
            'roles.*' => 'required:roles|string|exists:roles,id',
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
