<?php

use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->boolean('view_room');
            $table->boolean('manage_room');
            $table->boolean('view_guest');
            $table->boolean('manage_guest');
            $table->timestamps();
            
            $table->index('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
