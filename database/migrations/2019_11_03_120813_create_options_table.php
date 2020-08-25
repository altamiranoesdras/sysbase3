<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('options', function(Blueprint $table)
		{
			$table->id();
			$table->bigInteger('option_id')->unsigned()->nullable()->index('fk_options_options1_idx')->comment('opcion padre');
			$table->string('nombre');
			$table->string('ruta')->nullable();
			$table->string('descripcion')->nullable();
			$table->string('icono_l', 100);
			$table->string('icono_r', 100)->nullable();
			$table->integer('orden')->nullable()->default(0);
            $table->string('color','50')->nullable();

            $table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('options');
	}

}
