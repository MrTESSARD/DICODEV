<?php
namespace App\src\Controller;
use App\src\Repository\ManagerRepository;

class ManagerController extends ManagerRepository{
    public function loadHeader()
    {
        require_once '../templates/general/header.php';
    }

    public function home() 
    {
        require_once '../templates/homepage/homepage.php';
    }

    public function loadFooter()
    {
        require_once '../templates/general/footer.php';
    }
    
    public function profilePage()
    {
        require_once '../templates/auth/profile.php';
    }
    public function code401()
    {
        require_once '../templates/pagesErreur/401.php';
    }
    public function code402()
    {
        require_once '../templates/pagesErreur/402.php';
        }
    public function code403()
    {
        require_once '../templates/pagesErreur/403.php';
        }
    public function code404()
    {
        require_once '../templates/pagesErreur/404.php';
        }

}