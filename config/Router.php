<?php

namespace App\config;

use App\src\Controller\ManagerController;
use App\src\Controller\General\SidebarController;
use App\src\Controller\AuthController\GeneralAuthController;


class Router 
{
    
    private $managerController;
    private $sidebarController;
    private $generalAuthController;
    
    public function __construct()
    {
        $this->managerController = new ManagerController();
        $this->sidebarController = new SidebarController();
        $this->generalAuthController = new GeneralAuthController();
    }

    public function run()
    {
        $this->managerController->loadHeader();
        $this->sidebarController->loadSidebar();

        if (isset($_GET['auth'])) 
        {
            if($_GET['auth'] === "signup")
            {
                if(isset($_GET['error'])) 
                {
                    if($_GET['error'] === "EmptyInput")
                    {
                        echo "<div class='error'>Erreur, des champs sont vides.</div>";
                    }
                    elseif($_GET['error'] === "InvalidUsername")
                    {
                        echo "<div class='error'>Erreur, le nom d'utilisateur n'est pas valide.</div>";
                    }
                    elseif($_GET['error'] === "InvalidEmail")
                    {
                        echo "<div class='error'>Erreur, mail non valide.</div>";
                    }
                    elseif($_GET['error'] === "PasswordMatch")
                    {
                        echo "<div class='error'>Erreur, les mots de passe sont différents.</div>";
                    }
                }

                $this->generalAuthController->signupPage($_POST);
            }
            if($_GET['auth'] === "login")
            {
                $this->generalAuthController->loginPage($_POST);
            }
            if($_GET['auth'] === "profile")
            {
                $this->generalAuthController->profilePage();
            }
            if($_GET['auth'] === "profile/update")
            {
                $this->generalAuthController->profileUpdate($_POST);
            }
            if($_GET['auth'] === "logout")
            {
                $this->generalAuthController->logout();
            }
            if($_GET['auth'] === "successLogout")
            {
                $this->managerController->home();
            }
        }
        if(isset($_GET['route'])){
            if($_GET['route'] === "src"){
                if (isset($_GET['table'])&&($_GET['tuple'])) {
                    $this->sidebarController->bodyBloc($_GET);
                }  
            }
        }
        else
        {
            $this->managerController->home();
        }

        $this->managerController->loadFooter();
    }
}