<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHikeTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hike_training', function(Blueprint $table)
		{
			$table->foreign('hike_id', 'fk_hikes_trainings_hikes1')->references('id')->on('hikes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('training_id', 'fk_hikes_trainings_trainings1')->references('id')->on('trainings')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hike_training', function(Blueprint $table)
		{
			$table->dropForeign('fk_hikes_trainings_hikes1');
			$table->dropForeign('fk_hikes_trainings_trainings1');
		});
	}

}
