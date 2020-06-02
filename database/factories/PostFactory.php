<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->slug,
        'excerpt' => $faker->paragraph,
        'body' => "<p>$faker->text</p>",
        'published_at' => now(),
    ];
});
