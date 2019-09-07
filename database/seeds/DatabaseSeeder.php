<?php

use Illuminate\Database\Seeder;
use App\Operator;
use App\Brand;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		DB::statement( 'SET FOREIGN_KEY_CHECKS = 0' ); //DB WILL NOT VERIFY FOREIGN KEYS AT THE MOMENT OF TRUNCATE

		Operator::truncate();
		Brand::truncate();

		$this->call(OperatorsTableSeeder::class);
		$this->call(BrandsTableSeeder::class);

	}
}
