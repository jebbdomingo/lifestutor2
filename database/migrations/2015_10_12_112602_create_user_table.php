<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\ORM\Tools\SchemaTool;

class CreateUserTable extends Migration
{
    private $tool;
    private $em;

    public function __construct()
    {
        $this->em = app('EntityManager')->getFacadeRoot();

        $this->tool = new SchemaTool($this->em);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $classes = array(
            $this->em->getClassMetadata('Lifestutor\Data\Entities\User\User')
        );

        $this->tool->createSchema($classes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $classes = array(
            $this->em->getClassMetadata('Lifestutor\Data\Entities\User\User')
        );

        $this->tool->dropSchema($classes);
    }
}
