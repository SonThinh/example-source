<?php


namespace App\Domain\Companies\Requests;


use App\Domain\Support\Requests\ApiRequest;

class CreateCompanyRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'code'                 => 'required|string|unique:companies,code',
            'name'                 => 'required|string',
            'contact'              => 'filled|array',
            'contact.postcode'     => 'filled|string',
            'contact.city'         => 'filled|string',
            'contact.free_dial'    => 'filled|string',
            'contact.tel'          => 'filled|string',
            'contact.fax'          => 'filled|string',
            'contact.email'        => 'filled|string',
            'contact.website'      => 'filled|string',
            'contact.address'      => 'filled|string'
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
