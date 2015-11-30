<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id', true);
			$table->string('door_name', 255);
			$table->integer('site_id');
			$table->integer('floor_id');
			$table->integer('room_type_id');
			$table->integer('theme_id');
			$table->integer('ui_top');
			$table->integer('ui_left');
			$table->integer('ui_width');
			$table->integer('ui_height');
			$table->integer('status');
			$table->dateTime('last_update');
			$table->integer('update_by');
			$table->integer('website');
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
		Schema::drop('rooms');
	}

}
