<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rate_id', true);
			$table->string('rate_name', 255);
			$table->integer('hour_start');
			$table->integer('hour_end');
			$table->integer('duration');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rates');
	}

}
