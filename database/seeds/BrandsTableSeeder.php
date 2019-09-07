<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		factory(Brand::class, 1000)->create()->each(function() {
			factory(Brand::class)->make();
		});
	}
}
