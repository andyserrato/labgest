<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupTableSeeder');
		//$this->call('TypeTableSeeder');
		$this->call('LocationTableSeeder');
		//$this->call('UnitTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('ProductTableSeeder');
	}

}
