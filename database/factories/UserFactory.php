<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Account;
use Illuminate\Support\Str;
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

$factory->define(Account::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender'=> '1',
        'birthday' => $faker->dateTimeAD,
        'birthplace' => $faker->address,
        'resident' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '12345678', // password
        'phone' => $faker->phoneNumber,
        'avatar'=> $faker->url,
        'nationality'=>$faker->address,
        'daystowork'=>$faker->dateTime,
        'numbercard'=>'10245157518',
        'cmnd'=>$faker->swiftBicNumber,
        'remember_token' => Str::random(10),
        'id_role' => random_int(1, 3)
    ];
});
