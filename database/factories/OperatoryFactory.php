<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Operator;

$factory->define(Operator::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'url' => $faker->url,
		'active' => $faker->randomElement([Operator::ACTIVE, Operator::INACTIVE]),
		'date' => $faker->date(),
	];
});
