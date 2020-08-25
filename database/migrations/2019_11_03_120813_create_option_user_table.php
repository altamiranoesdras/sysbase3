<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('option_user', function(Blueprint $table)
		{
			$table->bigInteger('option_id')->unsigned()->index('fk_options_has_users_options1_idx');
			$table->bigInteger('user_id')->unsigned()->index('fk_options_has_users_users1_idx');
			$table->primary(['option_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('option_user');
	}

}
