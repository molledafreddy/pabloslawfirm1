<?php

use Faker\Generator as Faker;

$factory->define(App\CaseUser::class, function (Faker $faker) {
    return [
        'user_id' => function(){
           return factory(App\User::class)->create()->id;
         },
         'case_id' => function(){
           return factory(App\CaseClient::class)->create()->id;
         },
    ];
});
