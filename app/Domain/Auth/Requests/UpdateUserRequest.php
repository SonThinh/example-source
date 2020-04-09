<?php


namespace App\Domain\Auth\Requests;


use App\Domain\Support\Requests\ApiRequest;

class UpdateUserRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'gender' => 'sometimes|string',
            'birthday' => 'sometimes|date|date_format:Y-m-d',
            'email' => 'sometimes|email|unique:users,email',
            'password' => 'sometimes|confirmed',
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
