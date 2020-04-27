<?php


namespace App\Requests\Auth;


use App\Requests\ApiRequest;

class CreateUserRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'first_name'            => 'required|string',
            'last_name'             => 'required|string',
            'gender'                => 'required|string|in:male,female',
            'birthday'              => 'required|date|date_format:Y-m-d',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'contact'               => 'filled|array',
            'contact.postcode'      => 'filled|string',
            'contact.city'          => 'filled|string',
            'contact.free_dial'     => 'filled|string',
            'contact.tel'           => 'filled|string',
            'contact.fax'           => 'filled|string',
            'contact.email'         => 'filled|string',
            'contact.website'       => 'filled|string',
            'contact.address'       => 'filled|string'
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
