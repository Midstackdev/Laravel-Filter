<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->sentence,
        'slug' => Str::slug($name),
        'free' => rand(0, 1),
        'difficulty' => ['beginner', 'intermediate', 'advanced'][rand(0, 2)],
        'type' => ['theory', 'project', 'snippet'][rand(0, 2)]
    ];
});
