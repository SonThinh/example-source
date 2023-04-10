<?php


namespace App\Transformers\Shared;

use App\Models\Prefecture;
use Flugg\Responder\Transformers\Transformer;

class PrefectureTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param Prefecture $prefecture
     * @return array
     */
    public function transform(Prefecture $prefecture): array
    {
        return [
            'id' => (string)$prefecture->id,
            'prefecture_code' => (string)$prefecture->prefecture_code,
            'display_name' => (string)$prefecture->display_name,
            'display_order' => (int)$prefecture->display_order,
        ];
    }
}
