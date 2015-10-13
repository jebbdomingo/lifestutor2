<?php

namespace Lifestutor\Data\Entities\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
