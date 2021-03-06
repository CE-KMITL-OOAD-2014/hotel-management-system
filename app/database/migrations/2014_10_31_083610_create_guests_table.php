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

		Schema::create('guests', function($table)
		{
			$table->increments('id');
			$table->string('gender',10);
			$table->string('nationality',255);
			$table->string('name',255);
			$table->string('lastname', 255);
			$table->date('dateOfBirth',255);
			$table->text('address');
			$table->string('tel',255);
			$table->string('passportNo',255)->nullable();
			$table->string('citizenCardNo',255)->nullable();
			$table->text('comment')->nullable();
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
