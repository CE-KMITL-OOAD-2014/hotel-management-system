<?php

use Illuminate\Database\Migrations\Migration;

class CreateRequestHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_hotel', function($table)
		{
			$table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('user_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('request_hotel');
	}

}
