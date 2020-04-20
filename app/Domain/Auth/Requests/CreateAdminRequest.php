<?php


namespace App\Domain\Auth\Requests;


use App\Domain\Support\Requests\ApiRequest;

class CreateAdminRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'username' => 'required|string|unique:admins,username',
            'roles' => 'required|array',
            'roles.*' => 'required:roles|string|exists:roles,id',
            'password' => 'required|confirmed',
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
