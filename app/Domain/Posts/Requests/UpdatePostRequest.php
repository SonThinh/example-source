<?php


namespace App\Domain\Posts\Requests;


use App\Domain\Support\Requests\ApiRequest;

class UpdatePostRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'title' => 'filled|string',
            'content' => 'filled|string',
            'post_type' => 'filled|string',
            'status' => 'filled|string',
            'display_order' => 'filled|integer',
            'publish_from' => 'filled|string',
            'publish_to' => 'filled|string',
            'delivery_target' => 'filled|array',
            'delivery_target.prefecture_id' => 'sometimes|string|exists:prefectures,id',
            'delivery_target.company_id' => 'sometimes|string|exists:companies,id',
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
