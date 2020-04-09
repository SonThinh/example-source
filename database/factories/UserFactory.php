<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Auth\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->name($gender),
        'gender' => $gender,
        'birthday' => $faker->date(),
        'email' => $faker->unique()->safeEmail,
        'password' => 'password'
    ];
});
