<?php

namespace Lifestutor\Data\Entities\Member;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @ORM\Entity
 * @ORM\Table(name="Member")
 */
class Member implements Authenticatable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @ORM\column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $token;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setFirstName($name)
    {
        $this->first_name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setLastName($name)
    {
        $this->last_name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email;
    }

    /**
     * Set email address
     * 
     * @param string $value Email address
     *
     * @return self
     */
    public function setEmailAddress($value)
    {
        $this->email = $value;

        return $this;
    }

    /**
     * Set password
     * 
     * @param string $value Password
     *
     * @return self
     */
    public function setPassword($value)
    {
        $this->password = $value;

        return $this;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_me_token';
    }
}
