<?php
namespace App\src\Controller\General;

use App\src\Controller\ManagerController;
use App\src\Repository\GeneralRepository\DynamicRepository;


class SidebarController extends ManagerController
{
    private $dynamicRepository;

    public function __construct()
    {
        $this->dynamicRepository = new DynamicRepository();
    }

    public function loadSidebar(){
        require "../config/Variables.php"; 

        $requeteLangageSideBar = $this->dynamicRepository->getLangageSideBar();
        $requeteProprieteSideBar = $this->dynamicRepository->getProprieteSideBar();
        $requeteFunctionSideBar = $this->dynamicRepository->getFunctionSideBar();
        
        $this->dynamicRepository->getJSON();

        $barNavLangages = $this->dynamicRepository->getFunctionbarNav($requeteLangageSideBar);
        $barNavPropriete = $this->dynamicRepository->getFunctionbarNav($requeteProprieteSideBar);
        $barNavFonctions = $this->dynamicRepository->getFunctionbarNav($requeteFunctionSideBar);
        
        // require_once "../templates/general/searchBar.php";
        require "../templates/general/sidebarDynamic.php";
        echo $output_sidebar;

    }
    public function bodyBloc($get){
        require "../config/Variables.php";

        $requeteLangageSideBar = $this->dynamicRepository->getLangageSideBar();
        $requeteProprieteSideBar = $this->dynamicRepository->getProprieteSideBar();
        $requeteFunctionSideBar = $this->dynamicRepository->getFunctionSideBar();
       
        $requeteJSON = $this->dynamicRepository->getJSON();
        
        $barNavLangages = $this->dynamicRepository->getFunctionbarNav($requeteLangageSideBar);
        $barNavPropriete = $this->dynamicRepository->getFunctionbarNav($requeteProprieteSideBar);
        $barNavFonctions = $this->dynamicRepository->getFunctionbarNav($requeteFunctionSideBar);
        
        $BodyBloc = $this->dynamicRepository->getBodyBloc($get);
        //  var_dump($_GET[$table]);
        //  var_dump($BodyBloc);
        require "../templates/mainContent/bodyBloc".ucfirst($_GET[$table]).".php";


        // require_once('../writeJSON.php');


    }
}
