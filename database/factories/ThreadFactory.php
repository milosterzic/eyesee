<?php

/** @var Factory $factory */

use App\Thread;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'text' => $faker->text,
        'user_id' => null,
        'is_posted' => 0,
    ];
});
