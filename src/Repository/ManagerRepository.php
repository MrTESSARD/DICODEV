<?php
namespace App\src\Repository;
use PDO;
use PDOException;

class ManagerRepository
{
    public $connection;

    public function getConnection()
    {
        try {
            $database = new PDO(DB_FULL_HOST, DB_USER, DB_PASSWORD);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $database;

            return $this->connection;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    public function createQuery($sql,  $parameters = null)
    {
        $result = $this->checkConnection()->prepare($sql);
        // var_dump($result);
        // $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute($parameters);

        return $result;
    }
    
    public function fetchArray($result)
    {
        return $result->fetchAll(PDO::FETCH_ASSOC);
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
}