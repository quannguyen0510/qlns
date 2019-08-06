<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Role::class, function (Faker $faker) {
    return [
    'role' => $faker->randomDigit,
        'fixed_salary' => $faker->boolean
    ];
});
