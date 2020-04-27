<?php


namespace App\Domain\Posts\Actions;


use App\Models\Post;
use Illuminate\Support\Arr;

class CreatePostAction
{
    /**
     * @param  array  $data
     * @return Post|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $post = Post::create(Arr::except($data, 'delivery_target'));
        if ($deliveryTargetData = Arr::get($data, 'delivery_target')) {
            $attributes = ['post_id' => $post->id];
            $post->deliveryTarget()->firstOrCreate($attributes, $deliveryTargetData);
        }
        if ($assetData = Arr::get($data, 'assets')){
            $post->assets()->attach(Arr::get($data, 'assets'));
        }
        return $post;
    }
}
