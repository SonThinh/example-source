<?php


namespace App\Domain\Posts\Actions;

use App\Models\Post;
use Illuminate\Support\Arr;

class UpdatePostAction
{
    /**
     * @param  Post  $post
     * @param  array  $data
     * @return Post|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Post $post, array $data)
    {
        $post->update(Arr::except($data, 'delivery_target'));
        if ($deliveryTargetData = Arr::get($data, 'delivery_target')) {
            $attributes = ['post_id' => $post->id];
            $post->deliveryTarget()->updateOrCreate($attributes, $deliveryTargetData);
        }
        if ($assetData = Arr::get($data, 'assets')){
            $post->assets()->sync(Arr::get($data, 'assets'));
        }
        return $post;
    }
}
