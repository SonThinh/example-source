<?php


namespace App\Requests\Auth;


use App\Requests\ApiRequest;

class SyncPermissionRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'permissions' => 'required|array',
            'permissions.*' => 'required|exists:permissions,id',
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
