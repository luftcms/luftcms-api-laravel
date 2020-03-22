<?php

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

$faker->define(\App\Item::class, function (Faker $faker) {
    return [
        'item_name' => $faker->sentence(2),
        'value' => $faker->sentences,
        'type_id' => \App\Type::query()->inRandomOrder()->first()->id,
        'user_id' => 1,
    ];
});
