<?php

use Illuminate\Database\Seeder;
use App\Operator;

class OperatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(Operator::class, 1000)->create()->each(function() {
		    factory(Operator::class)->make();
	    });
    }
}
