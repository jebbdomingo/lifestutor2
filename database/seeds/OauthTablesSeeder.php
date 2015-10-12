<?php

use Illuminate\Database\Seeder;

class OauthTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate sample oauth.
        DB::table('oauth_clients')->insert([
            'id'     => 'testclient',
            'secret' => 'secret',
            'name'   => 'Test Client',
        ]);

        DB::table('oauth_scopes')->insert([
            'id'          => 'basic',
            'description' => 'Basic details about your account',
        ]);
        DB::table('oauth_scopes')->insert([
            'id'          => 'email',
            'description' => 'Your email address',
        ]);
        DB::table('oauth_scopes')->insert([
            'id'          => 'photo',
            'description' => 'Your photo',
        ]);

        DB::table('oauth_sessions')->insert([
            'owner_type' =>  'client',
            'owner_id'   =>  'testclient',
            'client_id'  =>  'testclient',
        ]);
        DB::table('oauth_sessions')->insert([
            'owner_type' =>  'user',
            'owner_id'   =>  '1',
            'client_id'  =>  'testclient',
        ]);
        DB::table('oauth_sessions')->insert([
            'owner_type' =>  'user',
            'owner_id'   =>  '2',
            'client_id'  =>  'testclient',
        ]);

        DB::table('oauth_access_tokens')->insert([
            'id'           =>  '2AUF8yZS0m',
            'session_id'   =>  '1',
            'expire_time'  =>  time() + 86400,
        ]);
        DB::table('oauth_access_tokens')->insert([
            'id'           =>  'kZnASO9fSI',
            'session_id'   =>  '2',
            'expire_time'  =>  time() + 86400,
        ]);
        DB::table('oauth_access_tokens')->insert([
            'id'           =>  'S90msiZbeY',
            'session_id'   =>  '3',
            'expire_time'  =>  time() + 86400,
        ]);
        DB::table('oauth_access_token_scopes')->insert([
            'access_token_id' =>  '2AUF8yZS0m',
            'scope_id'        =>  'basic',
        ]);
        DB::table('oauth_access_token_scopes')->insert([
            'access_token_id' =>  '2AUF8yZS0m',
            'scope_id'        =>  'email',
        ]);
        DB::table('oauth_access_token_scopes')->insert([
            'access_token_id' =>  '2AUF8yZS0m',
            'scope_id'        =>  'photo',
        ]);
        DB::table('oauth_access_token_scopes')->insert([
            'access_token_id' =>  'kZnASO9fSI',
            'scope_id'        =>  'email',
        ]);
        DB::table('oauth_access_token_scopes')->insert([
            'access_token_id' =>  'S90msiZbeY',
            'scope_id'        =>  'photo',
        ]);

        // Genereate sample domain doctrine entities.
        $em        = app('EntityManager')->getFacadeRoot();
        $generator = \Faker\Factory::create();

        $populator = new Faker\ORM\Doctrine\Populator($generator, $em);
        $populator->addEntity('Lifestutor\Data\Entities\Member\Member', 3, array(
          'password' => function() use ($generator) { return bcrypt(str_random(10)); },
          'token'    => function() use ($generator) { return str_random(10); }
        ));

        $insertedPKs = $populator->execute();
    }
}
