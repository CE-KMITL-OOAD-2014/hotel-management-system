<?php

use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		chema::create('guests', function($table)
		{
			Schema::create('users', function($table){
			$table->increments('id');
			$table->string('gender',255);
			$table->string('nationality',255);
			$table->string('name',255);
			$table->string('lastname', 255);
			$table->string('dateOfBirth',255);
			$tsble->string('address',255);
			$table->string('telephoneNumber',255)->unique();
			$table->string('passporNo',255);->unique();
			$table->string('citizen card',255)->unique();
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
		Schema::drop('guests');
	}

}
