<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Operator;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('url', 1000);
	        $table->string('active')->default(Operator::INACTIVE);
	        $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
