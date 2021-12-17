<?php
namespace App\src\Repository\AuthRepository;

use App\src\Repository\ManagerRepository;

class SignupRepository extends ManagerRepository{

    public function signupUser(object $user)
    {
        $sql = 'INSERT INTO users (userName, userSurname, userUsername, userEmail, userPassword) VALUES (?, ?, ?, ?, ?);';
        $this->createQuery($sql, [
            $user->getName(),
            $user->getSurname(),
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }
    public function emptyInputSignup($post)
    {
        if(empty($post['name']) || empty($post['surname']) || empty($post['username']) || empty($post['email']) || empty($post['password']) || empty($post['passwordVerify']))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function invalidUsername($post) 
    {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $post['username'])) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    public function invalidEmail($post) 
    {
        if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    public function hashing($post) 
    {
        return $hash = password_hash($post, PASSWORD_DEFAULT);
    }
    
    public function passwordMatch($post) 
    {
        if($post['password'] !== $post['passwordVerify']) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }
}