<?php

use App\User;
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
    return [
      
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'profile_image' => 'http://via.placeholder.com/150x150',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

    ];
});

$factory->define(Mensseger::class, function (Faker $faker) {
    do {
        $from = rand(1, 150);
        $to = rand(1, 150);
        $ids = rand(1, 150);
    } while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
        'id_proyecto'=>ids
    ];
});
