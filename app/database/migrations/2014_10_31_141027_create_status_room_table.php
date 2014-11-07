<?php

use Illuminate\Database\Migrations\Migration;

class CreateStatusRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status_room', function($table)
		{
			$table->increments('id');
			$table->integer('statusroom_id')->unsigned();
			$table->integer('room_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('status_room');
	}

}
