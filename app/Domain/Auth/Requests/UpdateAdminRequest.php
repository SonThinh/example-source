<?php

namespace App\Domain\Auth\Requests;

use App\Domain\Support\Requests\ApiRequest;

class UpdateAdminRequest extends ApiRequest
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name'     => 'sometimes|string',
            'username' => 'sometimes|string|unique:admins,username,'.$this->route('admin')->id,
            'password' => 'sometimes|confirmed',
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
