<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'name' => "Ratul",
        'email' => "admin@admin.com",
        'password' => bcrypt(12345678), // password
        'remember_token' => Str::random(10),
    ];
});
