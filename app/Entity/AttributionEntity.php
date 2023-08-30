<?php

namespace App\Entity;

use Core\Entity\Entity;

class AttributionEntity extends Entity
{

    public function getUrl()
    {
        return 'index.php?p=Attribution&id=' . $this->id;
    }
}
