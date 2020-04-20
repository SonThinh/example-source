<?php


namespace App\Domain\Assets\Transformers;


use App\Domain\Assets\Models\Asset;
use Flugg\Responder\Transformers\Transformer;

class AssetTransformer extends Transformer
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
     * @param  Asset  $asset
     * @return array
     */
    public function transform(Asset $asset): array
    {
        return [
            'id' => (int) $asset->id,
            'name' => (string) $asset->name,
            'is_public' => (string) $asset->is_public,
            'mime_type' => (string) $asset->mime_type,
            'size' => (int) $asset->size,
            'disk' => (string) $asset->disk,
            'path' => (string) $asset->url,
            'additional' => (object) $asset->additional,
        ];
    }
}
