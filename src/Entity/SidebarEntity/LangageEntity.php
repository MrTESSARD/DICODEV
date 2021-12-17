<?php
namespace App\src\Entity\SidebarEntity;

class Langage {
    private $langageId;
    private $langageName;
    private $langageDesc;
    
    public function getLangageId()
    {
        return $this->langageId;
    }

    public function setLangageId($langageId)
    {
        $this->langageId = $langageId;

        return $this;
    }

    public function getLangageName()
    {
        return $this->langageName;
    }

    public function setLangageName($langageName)
    {
        $this->langageName = $langageName;

        return $this;
    }

    public function getLangageDesc()
    {
        return $this->langageDesc;
    }

    public function setLangageDesc($langageDesc)
    {
        $this->langageDesc = $langageDesc;

        return $this;
    }
}