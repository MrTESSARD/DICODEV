<?php
namespace App\src\Repository\GeneralRepository;

use App\src\Repository\ManagerRepository;

class DynamicRepository extends ManagerRepository {
    
    public function getLangageSideBar(){
        require "../config/Variables.php";
        $requete = $this->createQuery("SELECT $tableLangageLogo, $tableLangageId, $tableLangageLangage FROM $tableLangage ");
        return $requete;
    }
    public function getProprieteSideBar(){
        require "../config/Variables.php";
        $requete = $this->createQuery("SELECT $tableProprieteId, $tableProprieteId_langage, $tableProprietePropriete FROM $tablePropriete  ");
        return $requete;
    }
    public function getFunctionSideBar(){
        require "../config/Variables.php";
        $requete = $this->createQuery("SELECT  $tableFonctionId_propriete, $tableFonctionFonction FROM $tableFonctions ");
        return $requete;
    }
    public function getJSON(){
        require "../config/Variables.php";
        $requeteJSON = $this->createQuery("SELECT $tableLangage.$tableLangageLangage, $tablePropriete.$tableProprietePropriete, $tableFonctions.$tableFonctionFonction FROM $tableLangage INNER JOIN $tablePropriete ON $tablePropriete.$tableProprieteId_langage = $tableLangage.$tableLangageId INNER JOIN $tableFonctions ON $tableFonctions.$tableFonctionId_propriete = $tablePropriete.$tableLangageId ");
        $JSON = array(); //1
        $i=0;
        
        $JSON = (array)	$requeteJSON;
        // var_dump($JSON);

        while ( $ligneResultat = $requeteJSON -> fetch()) {
            $ligneResultat=((array)$ligneResultat);
            $JSON[$i] = $ligneResultat; //2
            
            $i++; 
        }
        // var_dump($JSON);
        $rien=array_shift($JSON);//suppresion du premier element du tableau associatif 
        // var_dump($JSON);
        $myFile = "../json/find.json";
        
        $fh = fopen($myFile, 'a+');
        ftruncate($fh,0);
        fwrite($fh, json_encode($JSON, JSON_PRETTY_PRINT));
        fclose($fh);
    }
    public function getFunctionbarNav($requeteSideBar){
        $barNavLangages = array();
        $i=0;
        $barNavLangages= (array)	$requeteSideBar;
     
        while ( $ligneResultat = $requeteSideBar -> fetch()) {
            $ligneResultat=((array)$ligneResultat);
            $barNavLangages[$i]=  $ligneResultat; //toute la ligne dans format tableau";
            $i++;
        }
            $rien=array_shift($barNavLangages);

        return $barNavLangages;
    }
    public function BodyBloc($requeteBodyBloc){
        $BodyBloc = array(); //1
        $i=0;
        $BodyBloc = (array)	$requeteBodyBloc;

        while ( $ligneResultat = $requeteBodyBloc -> fetch()) {
            $ligneResultat=((array)$ligneResultat);
            $BodyBloc[$i] = $ligneResultat; //2
            $i++; 
        }
        $rien=array_shift($BodyBloc);//suppresion du premier element du tableau associatif 

        // var_dump($BodyBloc);
        # code...
        return $BodyBloc;
    }
    public function getBodyBloc($get){
        require "../config/Variables.php";
        if ($get["table"]=="langage") {
            $requeteBodyBloc = $this->createQuery("SELECT * FROM $tableLangage where $tableLangageLangage= '" .$_GET[$tuple]."'");
            $requeteBodyBloc = $this->BodyBloc($requeteBodyBloc);
            return $requeteBodyBloc;
            # code...
        }
        elseif ($get["table"]=="propriete") {
            // $requeteBodyBloc = $this->createQuery("SELECT * FROM $tablePropriete where $tableProprietePropriete= '" .$_GET[$tuple]."'");
            $requeteBodyBloc = $this->createQuery("SELECT $tableLangage.$tableLangageCss1,$tableLangage.$tableLangageLangage, $tablePropriete.$tableProprieteCss1, $tablePropriete.$tableProprietePropriete,$tablePropriete.$tableProprieteCss2, $tablePropriete.$tableProprieteData1  FROM $tablePropriete INNER JOIN $tableLangage ON $tablePropriete.$tableProprieteId_langage = $tableLangage.$tableLangageId where $tableProprietePropriete= '" .$_GET[$tuple]."'");
            $requeteBodyBloc = $this->BodyBloc($requeteBodyBloc);
            return $requeteBodyBloc;
        }
        elseif ($get["table"]=="fonctions") {
            $requeteBodyBloc = $this->createQuery("SELECT $tableLangage.$tableLangageCss1,$tableLangage.$tableLangageLangage, $tablePropriete.$tableProprieteCss1, $tablePropriete.$tableProprietePropriete, $tableFonctions.$tableFonctionCss1, $tableFonctions.$tableFonctionFonction, $tableFonctions.$tableFonctionCss2, $tableFonctions.$tableFonctionData1  FROM $tablePropriete INNER JOIN $tableLangage ON $tablePropriete.$tableProprieteId_langage = $tableLangage.$tableLangageId INNER JOIN $tableFonctions ON $tableFonctions.$tableFonctionId_propriete = $tablePropriete.$tableLangageId where $tableFonctionFonction= '" .$_GET[$tuple]."'");
            $requeteBodyBloc = $this->BodyBloc($requeteBodyBloc);

            return $requeteBodyBloc;
        }   
    }
}