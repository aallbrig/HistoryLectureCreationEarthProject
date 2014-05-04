<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotspotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotspots', function($table)
    {
        $table->increments('id');
        $table->string('title');
        $table->text('description');
        $table->decimal('longitude', 5, 2);
        $table->decimal('latitude', 5, 2);
        $table->decimal('altitude', 5, 0);
        $table->integer('lesson_id')->unsigned();
        $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotspots');
	}

}
