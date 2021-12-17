<?php
namespace App\src\Entity\SidebarEntity;

class Attribute {
    private $attributeId;
    private $attributeName;
    private $categorieId;
 
    public function getAttributeId()
    {
        return $this->attributeId;
    }

    public function setAttributeId($attributeId)
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    public function getAttributeName()
    {
        return $this->attributeName;
    }

    public function setAttributeName($attributeName)
    {
        $this->attributeName = $attributeName;

        return $this;
    }

    public function getCategorieId()
    {
        return $this->categorieId;
    }

    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }
}