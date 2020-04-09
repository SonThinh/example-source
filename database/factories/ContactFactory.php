<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Shared\Models\Contact;
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

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'free_dial' => $faker->e164PhoneNumber,
        'tel' => $faker->phoneNumber,
        'fax' => $faker->e164PhoneNumber,
        'email' => $faker->companyEmail,
        'website' => $faker->url,
        'address' => $faker->address
    ];
});
