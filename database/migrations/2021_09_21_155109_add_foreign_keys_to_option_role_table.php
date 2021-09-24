<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOptionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('option_role', function (Blueprint $table) {
            $table->foreign('option_id', 'fk_options_has_roles_options1')->references('id')->on('options')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('role_id', 'fk_options_has_roles_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('option_role', function (Blueprint $table) {
            $table->dropForeign('fk_options_has_roles_options1');
            $table->dropForeign('fk_options_has_roles_roles1');
        });
    }
}
