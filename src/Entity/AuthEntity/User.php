<?php
namespace App\src\Entity\AuthEntity;

class User {
    private $id;
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $passwordVerify;

    public function getId()
    {
        return $this->id;
    }
 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPasswordVerify()
    {
        return $this->passwordVerify;
    }

    public function setPasswordVerify(string $passwordVerify)
    {
        $this->passwordVerify = $passwordVerify;

        return $this;
    }
}