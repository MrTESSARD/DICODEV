<?php
namespace App\src\Controller\AuthController;

use App\src\Controller\ManagerController;
use App\src\Repository\AuthRepository\SignupRepository;
use App\src\Repository\AuthRepository\LoginRepository;
use App\src\Repository\AuthRepository\ProfileRepository;
use App\src\Repository\AuthRepository\LogoutRepository;
use App\src\Entity\AuthEntity\User;

class GeneralAuthController extends ManagerController{
    
    private $signupRepository;
    private $loginRepository;
    private $profileRepository;
    private $logoutRepository;
    
    public function __construct()
    {
        $this->signupRepository = new SignupRepository();
        $this->loginRepository = new LoginRepository();
        $this->profileRepository = new ProfileRepository();
        $this->logoutRepository = new LogoutRepository();
    }
    
    public function signupPage($post)
    {
        if(isset($post['signup']))
        {   
            $hashPassword = $this->signupRepository->hashing($post['password']);
            $user = new User();
            $user
                ->setName($post['name'])
                ->setSurname($post['surname'])
                ->setUsername($post['username'])
                ->setEmail($post['email'])
                ->setPassword($hashPassword)
                ->setPasswordVerify($post['passwordVerify']);

            if($this->signupRepository->emptyInputSignup($post) === false)
            {
                $href="?auth=signup&error=EmptyInput";
                return JSRedirect($href);
                die();
            }
            elseif($this->signupRepository->invalidUsername($post) === false)
            {
                $href="?auth=signup&error=InvalidUsername";
                return JSRedirect($href);
                die();
            }
            elseif($this->signupRepository->invalidEmail($post) === false)
            {
                $href="?auth=signup&error=InvalidEmail";
                return JSRedirect($href);
                die();
            }
            elseif($this->signupRepository->passwordMatch($post) === false)
            {
                $href="?auth=signup&error=PasswordMatch";
                return JSRedirect($href);
                die();
            }
            else {
                $this->signupRepository->signupUser($user);
                $href="?auth=login";
                return JSRedirect($href);
                die();
            }
        }
        else
        {
            require_once '../templates/auth/signup.php';
        }
    }

    public function loginPage($post)
    {
        if(isset($post['login']))
        {
            $user = new User();
            $user
                ->setUsername($post['username'])
                ->setEmail($post['username'])
                ->setPassword($post['password']);

            if($this->loginRepository->emptyInputLogin($post) === false)
            {
                $href="?auth=login&error=EmptyInput";
                return JSRedirect($href);
                die();
            }
            else 
            {
                $this->loginRepository->loginUser($user);
                if(isset($_SESSION['userId']))
                {
                    $href="?route=homepage";
                    return JSRedirect($href);
                    die();
                }
            }
        }
        
        require_once '../templates/auth/login.php';
    }

    public function profileUpdate($post)
    {
        if(isset($post['update']))
        {
            $user = new User();
            $user
                ->setId($_SESSION['userId'])
                ->setName($post['name'])
                ->setSurname($post['surname'])
                ->setUsername($post['username'])
                ->setEmail($post['email'])
                ->setPassword($post['password']);

            if($this->profileRepository->emptyInputProfile($post) === false)
            {
                $href="?auth=profile&error=EmptyInput";
                return JSRedirect($href);
                die();
            }
            else 
            {
                $this->profileRepository->updateUser($user);
                $href="?auth=profile";
                return JSRedirect($href);
                die();
            }
        }
        require_once '../templates/auth/profile_form.php';
    }

    public function logout()
    {
        ob_clean();
        $this->logoutRepository->logoutUser();
        $href="?auth=successLogout";
        return JSRedirect($href);
        die();
    }
}