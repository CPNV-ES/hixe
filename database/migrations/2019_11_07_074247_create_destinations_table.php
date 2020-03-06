<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDestinationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('destinations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('location', 100)->nullable();
			$table->string('latitude', 45)->nullable();
			$table->string('longitude', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('destinations');
	}

}
