<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDestinationHikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('destination_hike', function(Blueprint $table)
		{
			$table->foreign('destination_id', 'fk_destinations_hikes_destinations1')->references('id')->on('destinations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('hike_id', 'fk_destinations_hikes_hikes1')->references('id')->on('hikes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('destination_hike', function(Blueprint $table)
		{
			$table->dropForeign('fk_destinations_hikes_destinations1');
			$table->dropForeign('fk_destinations_hikes_hikes1');
		});
	}

}
