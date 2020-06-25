<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHikeUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hike_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('fk_hikes_users_users_idx');
			$table->integer('hike_id')->unsigned()->index('fk_hikes_users_hikes1_idx');
			$table->integer('role_id')->unsigned()->index('fk_hikes_users_roles1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hike_user');
	}

}
