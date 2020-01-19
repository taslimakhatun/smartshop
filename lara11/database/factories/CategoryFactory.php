<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->word,
        'cat_desc' => $faker->sentence,
        'cat_image' => $faker->imageUrl,
        'status' => rand(0,1)
    ];
});
