<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_type_id', true);
			$table->string('room_type_name', 255);
			$table->integer('site_id');
			$table->integer('rank');
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
		Schema::drop('room_types');
	}

}
