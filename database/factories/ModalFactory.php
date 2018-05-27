<?php

use Faker\Generator as Faker;
use App\Modal;

$factory->define(Modal::class, function (Faker $faker) {
    return [       
        'modal_text' => $faker->word,
        'modal_title' => $faker->word
    ];
});
