<?php
namespace App\src\Repository\AuthRepository;

class LogoutRepository
{  
    public function logoutUser() {

        session_unset();
        session_destroy();
    } 
}