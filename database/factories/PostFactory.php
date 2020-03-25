<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'author_id' => \App\User::all()->random(),
        'content' => $faker->text($maxNbChars = 200)
    ];
});
