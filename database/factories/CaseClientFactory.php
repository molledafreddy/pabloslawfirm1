<?php

use Faker\Generator as Faker;

$factory->define(App\CaseClient::class, function (Faker $faker) {
    return [
        
        'description' => $faker->text,
        'status_id' => $faker->numberBetween($min = 1, $max = 3),
         'date_created' => $faker->date,
        // 'user_id' => function(){
        //   return factory(App\User::class)->create()->id;
        // },
        'client_id' => function(){
          return factory(App\Client::class)->create()->id;
        },
    ];
});
