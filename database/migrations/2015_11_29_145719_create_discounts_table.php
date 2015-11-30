<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('discount_id', true);
			$table->string('discount_label', 255);
			$table->string('discount_type', 255);
			$table->float('discount_percent', 10, 0);
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
		Schema::drop('discounts');
	}

}
