<?php

use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function($table)
		{
			$table->increments('id');
			$table->string('roomnumber',255);
			$table->string('price', 255);
			$table->text('detail');
			$table->date('checkin',255)->nullable();
			$table->date('checkout',255)->nullable();
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
		Schema::drop('rooms');
	}

}
