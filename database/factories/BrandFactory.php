<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Model;
use App\Operator;
use Faker\Generator as Faker;

$factory->define( Brand::class, function ( Faker $faker ) {
	return [
		'name'        => $faker->word,
		'url'         => $faker->url,
		'operator_id' => $this->getRandomUserId(),
		//		'operator_id' => $faker->numberBetween( 0, 10000 ), //For Faster Seeding Purposes
		'active'      => $faker->randomElement( [ Brand::ACTIVE, Brand::INACTIVE ] ),
		'date'        => $faker->date(),
	];
} );


