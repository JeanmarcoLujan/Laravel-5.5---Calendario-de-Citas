<?php

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "phone" => $faker->name,
        "email" => $faker->safeEmail,
    ];
});
