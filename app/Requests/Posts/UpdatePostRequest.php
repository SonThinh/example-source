<?php


namespace App\Requests\Posts;


use App\Requests\ApiRequest;

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
            'assets' => 'nullable|array',
            'assets.*.group' => 'required_with:assets|string',
            'assets.*.asset_id' => 'required_with:assets|string|exists:assets,id',
            'delivery_target' => 'filled|array',
            'delivery_target.prefecture_id' => 'sometimes|string|exists:prefectures,id',
            'delivery_target.company_id' => 'sometimes|string|exists:companies,id',
            'delivery_target.category_id' => 'filled|string|exists:categories,id'
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
