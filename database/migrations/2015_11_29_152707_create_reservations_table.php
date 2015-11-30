<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('reserve_code', 255);
			$table->decimal('original_amount_paid', 12, 2);
			$table->integer('guest_id');
			$table->date('reserve_date');
			$table->integer('pax');
			$table->decimal('reserve_fee', 12, 2);
			$table->string('payment_type', 255);
			$table->text('notes');
			$table->string('status', 255);
			$table->string('pickup_time', 255);
			$table->string('pickup_location', 255);
			$table->dateTime('date_created');
			$table->integer('created_by');
			$table->dateTime('date_updated');
			$table->integer('updated_by');
			$table->string('Partner', 255);
			$table->string('card_type', 255);
			$table->string('approval_code', 255);
			$table->string('batch_number', 255);
			$table->integer('is_debit');
			$table->string('card_suffix', 255);
			$table->string('multi_entry_approver', 255);
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
		Schema::drop('reservations');
	}

}
