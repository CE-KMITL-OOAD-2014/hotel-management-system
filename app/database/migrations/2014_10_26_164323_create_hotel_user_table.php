<?php

use Illuminate\Database\Migrations\Migration;

class CreateHotelUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_user', function($table)
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
		Schema::drop('hotel_user');
	}

}
