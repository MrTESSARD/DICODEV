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
}