<?php

use Illuminate\Database\Migrations\Migration;

class AddLastLoginToUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
        {
		Schema::table('users', function($table)
		{
			$table->dateTime('last_login')->nullable()->after('items_per_page');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropColumn('last_login');
		});
	}
}
