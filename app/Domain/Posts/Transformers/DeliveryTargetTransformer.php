<?php


namespace App\Domain\Posts\Transformers;


use App\Domain\Posts\Models\DeliveryTarget;
use Flugg\Responder\Transformers\Transformer;

class DeliveryTargetTransformer extends Transformer
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
     * @param DeliveryTarget $target
     * @return array
     */
    public function transform(DeliveryTarget $target): array
    {
        return [
            'id' => (int)$target->id,
            'post_id' => (string)$target->post_id,
            'prefecture_id' => (string)$target->prefecture_id,
            'company_id' => (string)$target->company_id
        ];
    }
}
