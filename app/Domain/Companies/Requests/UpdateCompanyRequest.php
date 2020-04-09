<?php


namespace App\Domain\Companies\Requests;


use App\Domain\Support\Requests\ApiRequest;

class UpdateCompanyRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'code' => 'sometimes|string|unique:companies,code,' . $this->route('company'),
            'name' => 'sometimes|string',
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
