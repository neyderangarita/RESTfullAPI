<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


class DatabaseSeeder extends Seeder {

	public function run()
	{
		//Model::unguard();

		User::truncate();
		$this->call('UserSeeder');
	}


}
