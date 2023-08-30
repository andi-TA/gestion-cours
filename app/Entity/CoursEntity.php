<?php

namespace App\Entity;

use Core\Entity\Entity;

class CoursEntity extends Entity{
    
    public function getUrl()
    {
        return 'index.php?p=editCours&id='.$this->id;
    }
    public function getFilieres()
    {
        return 'index.php?p=showList&filiere='.$this->filiere;
    }
}
