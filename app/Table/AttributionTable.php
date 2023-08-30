<?php

namespace App\Table;

use Core\Table\Table;

class AttributionTable extends Table{

    protected $table = "attribution_cours";
    
    public function list($id)
    {
        return $this->query(
            "SELECT DISTINCT cours,annee,attribution_cours.id FROM etudiant,cours
            INNER JOIN attribution_cours
            WHERE attribution_cours.id_etudiant = ?
            AND cours.id = attribution_cours.id_cours
        ",[$id]);
    }
    public function attrId($idE,$idC)
    {
        return $this->query(
            "SELECT DISTINCT * FROM attribution_cours

            WHERE attribution_cours.id_etudiant = ?
            AND attribution_cours.id_cours = ?",
            [$idE,$idC],true
        );
    }
    public function InscriptionCours()
    {
        return $this->query(
        "   SELECT * FROM cours
            INNER JOIN attribution_cours
            WHERE attribution_cours.id_cours = cours.id
        ");
    }
    public function annee($id)
    {
        $r = $this->rowCount();

        if($r->rowCount > 0)
            return $this->query(
            "   SELECT * FROM etudiant
                INNER JOIN attribution_cours
                WHERE id_etudiant = ? ",
                [$id],true
            );
        return 0;
    }
}