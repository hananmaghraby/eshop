<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\User\User;
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

$factory->define(User::class, function (Faker $faker) {
    $isActive = $faker->boolean;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $isActive ? now() : null,
        'password' => bcrypt('secret'), // password
        'remember_token' => Str::random(10),
        'verify_token' => $isActive ? null : Str::uuid(),
        'status' => $isActive ? User::STATUS_ACTIVE : User::STATUS_WAIT,
        'role' => $isActive ? $faker->randomElement([
            User::ROLE_USER,
            User::ROLE_MANAGER,
            User::ROLE_ADMIN
        ]) : User::ROLE_USER
    ];
});
