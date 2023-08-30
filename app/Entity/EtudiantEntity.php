<?php

namespace App\Entity;

use Core\Entity\Entity;

class EtudiantEntity extends Entity{
    
    public function getUrl()
    {
        return 'index.php?p=editEtudiant&id=' . $this->id;
    }
    public function getAttribution()
    {
        return 'index.php?p=Attribution&id=' . $this->id;
    }
    public function getFilieres()
    {
        return 'index.php?p=showList&filiere=' . $this->filiere;
    }
}
