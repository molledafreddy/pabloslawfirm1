<?php

use Faker\Generator as Faker;
use App\Section;


$factory->define(Section::class, function (Faker $faker) {
    return [       
        'name' => $faker->word,
        'identifier' => $faker->word
    ];
});
