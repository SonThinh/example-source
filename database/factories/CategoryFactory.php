<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Shared\Models\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Category::class, function (Faker $faker) {
    return [
        'display_name' => $faker->safeColorName,
        'display_order' => $faker->randomElement(range(0,9)),
    ];
});
