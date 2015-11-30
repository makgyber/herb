<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoliosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('folios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('id', true);
			$table->string('created_by', 255);
			$table->string('updated_by', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->boolean('active');
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
		Schema::drop('folios');
	}

}
