<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'title' => $title,
        'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => str_slug($title, '-'),
        'cover' => '/images/chicken-at-facebook.jpg',
        'is_published' => 1,
        'user_id' => 1,
        'category_id' => 1
    ];
});
