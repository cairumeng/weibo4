<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    $user_ids = User::orderBy('id', 'asc')->limit(10)->get()->pluck('id');
    return [
        'user_id' => $faker->randomElement($user_ids),
        'follower_id' => $faker->randomElement($user_ids),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
