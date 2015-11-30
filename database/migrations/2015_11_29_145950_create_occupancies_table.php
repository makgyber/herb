<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupanciesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occupancy', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('occupancy_id', true);
			$table->dateTime('actual_checkin');
			$table->dateTime('expected_checkout');
			$table->dateTime('actual_checkout');
			$table->integer('shift_checkin');
			$table->integer('room_id');
			$table->integer('rate_id');
			$table->integer('update_by');
			$table->string('wakeup', 255);
			$table->string('isalerted', 255);
			$table->integer('regflag');
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
		Schema::drop('occupancy');
	}

}
