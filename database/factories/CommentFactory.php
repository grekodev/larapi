<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 200),
        'user_id' => \App\User::all()->random(),
        'post_id' => \App\Model\Post::all()->random()
    ];
});
