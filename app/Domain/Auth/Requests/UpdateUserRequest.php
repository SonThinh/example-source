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
            'email' => 'sometimes|email|unique:users,email,'.$this->route('user')->id,
            'password' => 'sometimes|confirmed',
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
