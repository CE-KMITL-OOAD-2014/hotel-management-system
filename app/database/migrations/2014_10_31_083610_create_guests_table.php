<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

			Schema::create('guests', function(Blueprint $table){
			$table->increments('id');
			$table->string('gender',255);
			$table->string('nationality',255);
			$table->string('name',255);
			$table->string('lastname', 255);
			$table->string('dateOfBirth',255);
			$table->string('address',255);
			$table->string('tel',255);
			$table->string('passportNo',255);
			$table->string('citizenCardNo',255);
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
