<?php
namespace App\src\Entity\SidebarEntity;

class Categorie {
    private $categorieId;
    private $categorieName;
    private $langageId;

    public function getCategorieId()
    {
        return $this->categorieId;
    }
 
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    public function getCategorieName()
    {
        return $this->categorieName;
    }

    public function setCategorieName($categorieName)
    {
        $this->categorieName = $categorieName;

        return $this;
    }

    public function getLangageId()
    {
        return $this->langageId;
    }

    public function setLangageId($langageId)
    {
        $this->langageId = $langageId;

        return $this;
    }
}