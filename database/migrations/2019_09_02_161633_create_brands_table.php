<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Brand;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('url', 1000);
	        $table->boolean('active')->default(Brand::INACTIVE);
	        $table->date('date');
	        $table->integer('operator_id')->unsigned();

	        $table->foreign('operator_id')->references('id')->on('operators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
