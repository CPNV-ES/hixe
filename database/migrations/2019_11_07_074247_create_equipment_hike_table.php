<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentHikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipment_hike', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hike_id')->unsigned()->index('fk_equipments_hikes_hikes1_idx');
			$table->integer('equipment_id')->unsigned()->index('fk_equipments_hikes_equipments1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipment_hike');
	}

}
