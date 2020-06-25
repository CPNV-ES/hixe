<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hikes', function(Blueprint $table)
		{
			$table->foreign('state_id', 'fk_hikes_states1')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hikes', function(Blueprint $table)
		{
			$table->dropForeign('fk_hikes_states1');
		});
	}

}
