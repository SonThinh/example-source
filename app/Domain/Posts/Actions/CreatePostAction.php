<?php


namespace App\Domain\Posts\Actions;


use App\Domain\Posts\Models\DeliveryTarget;
use App\Domain\Posts\Models\Post;
use Illuminate\Support\Arr;

class CreatePostAction
{
    /**
     * @param array $data
     * @return Post|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $post = new Post();
        $post->fill(Arr::except($data, 'delivery_target'));
        $post->save();

        $deliveryTarget = new DeliveryTarget();
        $deliveryTarget->fill(Arr::only($data, 'delivery_target'));

        $post->deliveryTarget()->save($deliveryTarget);
        
        return $post;
    }
}
