<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 25)->make()->each(function (Category $category) {
            $category->category_type = 'news';
            $category->save();
        });
    }
}
