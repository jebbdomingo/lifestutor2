<?php
namespace Lifestutor\Services\OAuth2\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OAuth2DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Lifestutor\Services\OAuth2\Database\Seeds\FoobarTableSeeder');
	}

}
