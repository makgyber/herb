<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('guest_id', true);
			$table->string('firstname', 255);
			$table->string('middlename', 255);
			$table->string('lastname', 255);
			$table->text('address');
			$table->string('gender', 255);
			$table->date('birthday');
			$table->string('email', 255);
			$table->string('phone', 255);
			$table->string('mobile', 255);
			$table->string('nationality', 255);
			$table->text('remarks');
			$table->string('company_name', 255);
			$table->string('company_position', 255);
			$table->text('company_address');
			$table->string('company_email', 255);
			$table->string('company_phone', 255);
			$table->string('company_mobile', 255);
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
		Schema::drop('guests');
	}

}
