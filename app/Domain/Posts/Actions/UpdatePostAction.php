<?php


namespace App\Domain\Posts\Actions;

use App\Domain\Posts\Models\Post;
use Illuminate\Support\Arr;

class UpdatePostAction
{
    /**
     * @param Post $post
     * @param array $data
     * @return Post|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Post $post, array $data)
    {
        $post->fill(Arr::except($data, 'delivery_target'));
        $post->save();
        
        $deliveryTarget = $post->deliveryTarget;
        $deliveryTarget->fill(Arr::get($data, 'delivery_target'));
        $deliveryTarget->save();
        return $post;
    }
}
