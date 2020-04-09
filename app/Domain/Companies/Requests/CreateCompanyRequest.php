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
            'code' => 'required|string|unique:companies,code',
            'name' => 'required|string',
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
