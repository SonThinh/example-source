<?php

use App\Domain\Posts\Models\DeliveryTarget;
use App\Domain\Posts\Models\Post;
use App\Domain\Shared\Models\Prefecture;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50)->create()->each(function (Post $post) {
            $prefecture = Prefecture::inRandomOrder()->first();
            $target = new DeliveryTarget();
            $target->prefecture_id = optional($prefecture)->id;
            $target->post()->associate($post);
            $target->save();
        });
    }
}
