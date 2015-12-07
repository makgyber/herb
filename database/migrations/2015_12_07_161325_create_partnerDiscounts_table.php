<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerDiscountsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_discounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->integer('partner_id');
			$table->decimal('discount', 11, 2);
			$table->string('remarks', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
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
		Schema::drop('partner_discounts');
	}

}
