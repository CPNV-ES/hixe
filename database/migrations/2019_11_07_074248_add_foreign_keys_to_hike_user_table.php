<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHikeUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hike_user', function(Blueprint $table)
		{
			$table->foreign('hike_id', 'fk_hikes_users_hikes1')->references('id')->on('hikes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_hikes_users_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_hikes_users_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hike_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_hikes_users_hikes1');
			$table->dropForeign('fk_hikes_users_roles1');
			$table->dropForeign('fk_hikes_users_users');
		});
	}

}
