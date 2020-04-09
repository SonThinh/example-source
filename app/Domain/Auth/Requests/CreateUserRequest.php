<?php


namespace App\Domain\Auth\Requests;


use App\Domain\Support\Requests\ApiRequest;

class CreateUserRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'birthday' => 'required|date|date_format:Y-m-d',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
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
