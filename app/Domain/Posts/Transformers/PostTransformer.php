<?php


namespace App\Domain\Posts\Transformers;


use App\Domain\Assets\Transformers\AssetTransformer;
use App\Domain\Posts\Models\Post;
use Flugg\Responder\Transformers\Transformer;

class PostTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'delivery_target' => DeliveryTargetTransformer::class,
        'assets' => AssetTransformer::class,
    ];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  Post  $post
     * @return array
     */
    public function transform(Post $post): array
    {
        return [
            'id' => (string) $post->id,
            'post_type' => (string) $post->post_type,
            'title' => (string) $post->title,
            'content' => (string) $post->content,
            'status' => (string) $post->status,
            'display_order' => (int) $post->display_order,
            'publish_from' => (string) $post->publish_from,
            'publish_to' => (string) $post->publish_to,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
            'deleted_at' => $post->deleted_at,
        ];
    }
}
