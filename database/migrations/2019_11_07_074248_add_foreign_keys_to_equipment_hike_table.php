<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipmentHikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipment_hike', function(Blueprint $table)
		{
			$table->foreign('equipment_id', 'fk_equipments_hikes_equipments1')->references('id')->on('equipments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('hike_id', 'fk_equipments_hikes_hikes1')->references('id')->on('hikes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipment_hike', function(Blueprint $table)
		{
			$table->dropForeign('fk_equipments_hikes_equipments1');
			$table->dropForeign('fk_equipments_hikes_hikes1');
		});
	}

}
