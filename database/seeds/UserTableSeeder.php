<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Genereate sample domain doctrine entities.
        $em        = app('EntityManager')->getFacadeRoot();
        $generator = \Faker\Factory::create();

        $populator = new Faker\ORM\Doctrine\Populator($generator, $em);
        $populator->addEntity('Lifestutor\Data\Entities\User\User', 3, array(
          'password' => function() use ($generator) { return bcrypt(str_random(10)); },
          'token'    => function() use ($generator) { return str_random(10); }
        ));

        $insertedPKs = $populator->execute();
    }
}
