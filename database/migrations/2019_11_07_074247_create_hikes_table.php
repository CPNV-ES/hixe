<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hikes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('meeting_location', 100);
			$table->dateTime('meeting_date');
			$table->dateTime('beginning_date');
			$table->dateTime('ending_date');
			$table->boolean('min_num_participants')->nullable();
			$table->boolean('max_num_participants')->nullable();
			$table->boolean('difficulty');
			$table->string('additional_info', 45)->nullable();
			$table->integer('drop_in_altitude');
			$table->integer('state_id')->unsigned()->index('fk_hikes_states1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hikes');
	}

}