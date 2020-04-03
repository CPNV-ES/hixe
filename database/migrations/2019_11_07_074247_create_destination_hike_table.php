<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDestinationHikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('destination_hike', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hike_id')->unsigned()->index('fk_destinations_hikes_hikes1_idx');
			$table->integer('destination_id')->unsigned()->index('fk_destinations_hikes_destinations1_idx');
			$table->integer('order')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('destination_hike');
	}

}
