<?php

class UserSeeder extends Seeder {
	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('admin')
		));
	}
}