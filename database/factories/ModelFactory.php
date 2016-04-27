<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Larabook\Users\User::class, function ($faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->email,
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});

$factory->define(Larabook\Statuses\Status::class, function ($faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => (Larabook\Users\User::count() == 0) ?
                    Larabook\Users\User::create()->id :
                    Larabook\Users\User::all()->random()->id,
    ];
});
