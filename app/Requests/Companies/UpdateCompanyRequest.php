<?php


namespace App\Requests\Companies;


use App\Requests\ApiRequest;

class UpdateCompanyRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'code'                 => 'sometimes|string|unique:companies,code,' . $this->route('company')->id,
            'name'                 => 'sometimes|string',
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
        return true;
    }
}
