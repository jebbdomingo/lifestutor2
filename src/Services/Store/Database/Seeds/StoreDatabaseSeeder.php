<?php
namespace Lifestutor\Services\Store\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StoreDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Lifestutor\Services\Store\Database\Seeds\FoobarTableSeeder');
	}

}
