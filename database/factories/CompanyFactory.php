<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->company . "Tourism",
        'about'=>$faker->paragraph(2),
        'location'=>$faker->address,
        'phone'=>$faker->phoneNumber,
        'verified'=>$faker->boolean,

    ];
});
