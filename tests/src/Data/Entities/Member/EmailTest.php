<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Lifestutor\Data\Entities\Member\Member;

class EmailTest extends TestCase
{
    /**
     * Should require an email address
     *
     * @return void
     */
    public function testShouldRequireEmail()
    {
        $this->setExpectedException('Exception');

        $member = new Email;

        //$this->assertEquals($member->getFirstName(), 'Dela Cruz');
    }

    /**
     * Should require a valid email address
     *
     * @return void
     */
    public function testShouldRequireValidEmail()
    {
        $this->setExpectedException('Lifestutor\Foundation\InvalidEmailException');

        $member = new Email('this_is_not_a_valid_email');
    }

    /**
     * Should accept a valid email address
     *
     * @return void
     */
    public function testShouldAcceptValidEmail()
    {
        $email = new Email('name@domain.com');

        $this->assertInstanceOf('Cribbb\Domain\Model\Users\Email', $email);
    }
}
