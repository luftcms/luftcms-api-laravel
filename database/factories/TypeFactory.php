<?php

Use Faker\Generator as Faker;

$faker->define(\App\Type::class, function (Faker $faker) {
   return [
       'type_name' => $faker->word
   ];
});
