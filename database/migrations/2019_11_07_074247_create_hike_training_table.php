<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHikeTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hike_training', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hike_id')->unsigned()->index('fk_hikes_trainings_hikes1_idx');
			$table->integer('training_id')->unsigned()->index('fk_hikes_trainings_trainings1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hike_training');
	}

}
