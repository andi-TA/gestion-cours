<?php

namespace App\Table;

use Core\Table\Table;

class EtudiantTable extends Table{

    protected $table =  "Etudiant";

    public function oneDistinct()
    {
        return $this->query("SELECT DISTINCT filiere FROM {$this->table}");
    }
}