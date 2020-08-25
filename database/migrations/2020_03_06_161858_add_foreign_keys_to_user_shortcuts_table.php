<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserShortcutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_shortcuts', function(Blueprint $table)
		{
			$table->foreign('option_id', 'fk_shortcuts_users_options1')->references('id')->on('options')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_shortcuts_users_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_shortcuts', function(Blueprint $table)
		{
			$table->dropForeign('fk_shortcuts_users_options1');
			$table->dropForeign('fk_shortcuts_users_users1');
		});
	}

}
