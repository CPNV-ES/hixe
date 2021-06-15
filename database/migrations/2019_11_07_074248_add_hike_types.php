<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHikeTypes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hike_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
		});
		
		Schema::table('hikes', function(Blueprint $table)
		{
			$table->integer('type_id')->unsigned()->index('fk_hikes_hike_types1_idx')->nullable();
			$table->foreign('type_id', 'fk_hikes_hike_types1')->references('id')->on('hike_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('hike_types');

		Schema::table('hikes', function(Blueprint $table)
		{
			$table->removeColumn('type_id');
			$table->dropForeign('fk_hikes_hike_types1');
		});
	}

}
