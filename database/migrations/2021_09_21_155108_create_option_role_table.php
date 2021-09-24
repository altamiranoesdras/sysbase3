<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_role', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id')->index('fk_options_has_roles_options1_idx');
            $table->unsignedBigInteger('role_id')->index('fk_options_has_roles_roles1_idx');
            $table->primary(['option_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_role');
    }
}
