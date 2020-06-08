<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'suburb' => $faker->citySuffix,
        'state' => $faker->state,
        'country' => $faker->country,
        'guid' => $faker->uuid,
    ];
});
