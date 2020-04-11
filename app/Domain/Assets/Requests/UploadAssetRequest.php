<?php


namespace App\Domain\Assets\Requests;

use App\Domain\Support\Requests\ApiRequest;

class UploadAssetRequest extends ApiRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'assets' => 'required|array|max:20',
            'assets.*' => 'required|file|max:20480',
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
