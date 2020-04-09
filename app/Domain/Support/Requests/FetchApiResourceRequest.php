<?php


namespace App\Domain\Support\Requests;

class FetchApiResourceRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'include' => 'sometimes',
            'include.*' => 'required_with:include|string',
            'fields' => 'sometimes|array',
            'fields.*' => 'required_with:fields|string',
            'page' => 'sometimes|array',
            'page.size' => 'required_with:page|string',
            'page.number' => 'required_with:page|string',
            'filters' => 'sometimes|array',
            'filters.*' => 'required_with:filters|string',
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
