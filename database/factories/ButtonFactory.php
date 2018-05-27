<?php

use Faker\Generator as Faker;
use App\Button;

$factory->define(Button::class, function (Faker $faker) {
    return [       
        'button_name' => $faker->word,
        'button_link' => $faker->url,
        'modal_id' => function(){
            return factory(App\Modal::class)->create()->id;
        }
    ];
});
