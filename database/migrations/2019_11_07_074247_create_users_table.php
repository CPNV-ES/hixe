<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 45);
			$table->string('lastname', 45)->nullable();
			$table->string('email_address', 45)->unique('email_address_UNIQUE');
			$table->string('github_id')->nullable();
			$table->integer('member_number')->unique('member_number_UNIQUE')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('password', 255)->nullable();

			$table->rememberToken();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
