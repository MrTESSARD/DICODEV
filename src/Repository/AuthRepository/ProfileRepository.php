<?php
namespace App\src\Repository\AuthRepository;

use App\src\Repository\ManagerRepository;
use PDO;

class ProfileRepository extends ManagerRepository
{
    public function updateUser(object $user)
    {
        $sql = 'SELECT * FROM users WHERE userId = ?;';
        $result = $this->createQuery($sql, ([
            $user->getId()
        ]));

        $paswordHashed = $result->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($user->getPassword(), $paswordHashed[0]["userPassword"]);
        
        if($checkPwd == false)
        {
            $result = null;
            echo "<div class='error'>Mot de passe invalide.</div>";
        }
        elseif($checkPwd == true) 
        {
            $sql = "UPDATE users SET userName = ?, userSurname = ?, userUsername = ?, userEmail = ? WHERE userId = ?";
            $this->createQuery($sql, [
                    $user->getName(),
                    $user->getSurname(),
                    $user->getUsername(),
                    $user->getEmail(),
                    $user->getId()
                ]);

            if($result->rowCount() == 0) {
                $result = null;
                echo "<div class='error'>Erreur, utilisateur inconnu.</div>";
            }
            else
            {
                $_SESSION["userName"] = $user->getName();
                $_SESSION["userSurname"] = $user->getSurname();
                $_SESSION["userUsername"] = $user->getUsername();
                $_SESSION["userEmail"] = $user->getEmail();
                
                $result = null;
            }
        }
    }
    
    public function emptyInputProfile($post)
    {
        if(empty($post['name']) || empty($post['surname']) || empty($post['username']) || empty($post['email']) || empty($post['password']))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}