<?php

use Faker\Generator as Faker;
use App\Component;

$factory->define(Component::class, function (Faker $faker) {
    return [
        'image'=>$faker->word,
        'title'=>$faker->word,
        'subtitle'=>$faker->word,
        'description'=>$faker->text(50),
        'section_id' => function(){
            return factory(App\Section::class)->create()->id;
        },'button_id' => function(){
            return factory(App\Button::class)->create()->id;
        }
    ];
});
