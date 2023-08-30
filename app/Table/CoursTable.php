<?php

namespace App\Table;

use Core\Table\Table;

class CoursTable extends Table
{
    protected $table =  "Cours";

    public function oneDistinct()
    {
        return $this->query("SELECT DISTINCT filiere FROM {$this->table}");
    }

    public function listAttributionCours($filiere)
    {
        return $this->query(
        "   SELECT * FROM etudiant
            WHERE etudiant.filiere = '{$filiere}' 
        ");
    }
}
