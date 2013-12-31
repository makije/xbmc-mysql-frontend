<?php

use Illuminate\Database\Migrations\Migration;

class CreateWishTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishes', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->enum('type', array('movie', 'tvshow', 'album', 'song'));
			$table->string('url')->nullable();
			$table->string('granted_url')->nullable();
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
		Schema::dropIfExists('wishes');
	}

}
