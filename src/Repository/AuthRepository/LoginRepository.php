<?php
namespace App\src\Repository\AuthRepository;
use App\src\Repository\ManagerRepository;

class loginRepository extends ManagerRepository{
    public function loginUser(object $user)
    {
        $sql = 'SELECT * FROM users WHERE userUsername = ? OR userEmail = ?;';
        $result = $this->createQuery($sql, [
            $user->getUsername(),
            $user->getEmail()
        ]);
        
        if($result->rowCount() == 0) {
            $result = null;
            echo "<div class='error'>Erreur, nom d'utilisateur ou email invalide.</div>";
        }
        else
        {
            $paswordHashed = $this->fetchArray($result);
            $checkPwd = password_verify($user->getPassword(), $paswordHashed[0]["userPassword"]);
            if($checkPwd == false) 
            {
                $result = null;
                echo "<div class='error'>Erreur, mot de passe invalide.</div>";
            }
            else 
            {
                $user->setPassword($paswordHashed[0]["userPassword"]);

                $sql = 'SELECT * FROM users WHERE userUsername = ? OR userEmail = ? AND userPassword = ?;';
                $result = $this->createQuery($sql, [
                    $user->getUsername(),
                    $user->getEmail(),
                    $user->getPassword()
                ]);

                if($result->rowCount() == 0) {
                    $result = null;
                    echo "<div class='error'>Erreur, utilisateur inconnu.</div>";
                }
                else
                {
                    $user = $this->fetchArray($result);
                        // session_start();
                    $_SESSION["userId"] = $user[0]["userId"];
                    $_SESSION["userName"] = $user[0]["userName"];
                    $_SESSION["userSurname"] = $user[0]["userSurname"];
                    $_SESSION["userUsername"] = $user[0]["userUsername"];
                    $_SESSION["userEmail"] = $user[0]["userEmail"];

                    $result = null;
                }
            }
        }
    }
    public function emptyInputLogin($post)
    {
        if(empty($post['username'])|| empty($post['password']))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}