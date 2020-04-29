<?php


namespace App\Requests\Shared;


use App\Requests\ApiRequest;

class CreateCategoryRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'category_type' => 'required|string',
            'display_name' => 'required|string',
            'display_order' => 'filled|integer',
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
