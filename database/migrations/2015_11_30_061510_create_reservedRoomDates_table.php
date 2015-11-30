<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedRoomDatesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reserved_room_date', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('id', true);
			$table->bigInteger('reserve_room_id');
			$table->integer('room_id');
			$table->date('cal_date');
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
		Schema::drop('reserved_room_date');
	}

}
