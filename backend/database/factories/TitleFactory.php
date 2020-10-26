<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Title;
use Faker\Generator as Faker;

$factory->define(Title::class, function (Faker $faker) {
    return [
        // 親テーブルのidを生成して持ってくる
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'title' => $faker->word, 
    ];
});
