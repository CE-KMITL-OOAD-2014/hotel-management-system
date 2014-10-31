<?php

use Illuminate\Database\Migrations\Migration;

class CreateGuestsHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guest_hotel', function($table)
		{
			$table->increments('id');
			$table->integer('guest_id')->unsigned();
			$table->integer('hotel_id')->unsigned();
            
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guest_hotel');
	}

}
