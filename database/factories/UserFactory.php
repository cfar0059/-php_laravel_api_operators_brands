<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Operator;
use App\Brand;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Operator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->url,
        'active' => $faker->randomElement([Operator::ACTIVE, Operator::INACTIVE]),
        'date' => $faker->date(),
    ];
});

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'url' => $faker->url,
	    'operator_id' => Operator::all()->random()->id,
        'active' => $faker->randomElement([Brand::ACTIVE, Brand::INACTIVE]),
        'date' => $faker->date(),
    ];
});
