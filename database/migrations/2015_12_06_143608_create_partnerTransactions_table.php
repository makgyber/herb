<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTransactionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('pt_id', true);
			$table->dateTime('transaction_date');
			$table->string('reserve_code', 255);
			$table->string('booking_number', 255);
			$table->string('partner_name', 255);
			$table->decimal('recievable', 10, 2);
			$table->decimal('payable', 10, 2);
			$table->text('remarks');
			$table->string('result_status', 255);
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
		Schema::drop('partner_transactions');
	}

}
