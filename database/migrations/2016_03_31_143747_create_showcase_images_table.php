<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShowcaseImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('showcase_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('showcase_id')->unsigned();
			$table->string('image', 512);
			$table->string('label', 512)->nullable();
			$table->boolean('sort')->default(1);
			$table->boolean('main')->default(0);
			$table->boolean('exclude')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('showcase_images');
	}

}
