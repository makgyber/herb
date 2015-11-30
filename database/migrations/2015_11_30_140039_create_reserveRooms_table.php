<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveRoomsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reserve_rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('rr_id', true);
			$table->string('reserve_code', 255);
			$table->integer('room_type_id');
			$table->integer('room_id');
			$table->date('checkin');
			$table->date('checkout');
			$table->integer('deposit');
			$table->string('status', 255);
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
		Schema::drop('reserve_rooms');
	}

}
