<?php

use Faker\Generator as Faker;
use App\Client;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
    ];
});
