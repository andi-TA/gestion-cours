<?php

namespace App\Controller;

use App\Controller\Admin\AppController;
use Core\HTML\ReForm;

class AttributionController extends AppController{
    protected $table = "attribution_cours";
    
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Etudiant');
        $this->loadModel('Cours');
        $this->loadModel('Attribution');
    }
    public function AttributionCours()
    {
        $etudiant = $this->Etudiant->find($_GET['id']);
        $cours = $this->Cours->all();
        
        $form1 = new ReForm($etudiant);
        $form = new ReForm();

        $countCours = $this->Cours->rowCount();
        $errors = null;

        if(!empty($_POST))
        {
            $attr = $this->Attribution->annee($_POST['Aeid']);
            
            if($countCours->rowCount > 0 && !empty($attr))
            {
                if($attr->id_cours == $_POST['Acid'] && $attr->id_etudiant == $_POST['Aeid'])
                {
                    $errors = "Cours déja attribuer!";
                }
                elseif($attr->annee !== $_POST['annee'])
                {
                    $errors = "Vérifier l'année de l'étudiant!";
                }
                else
                {
                    $attribuer = $this->Attribution->insert([
                        'id_etudiant' => $_POST['Aeid'],
                        'id_cours' => $_POST['Acid'],
                        'annee' => $_POST['annee']
                    ]);
                    $errors = "Enregistrement effectuez!";
                }
            }
            else
            {
                $attribuer = $this->Attribution->insert([
                    'id_etudiant' => $_POST['Aeid'],
                    'id_cours' => $_POST['Acid'],
                    'annee' => $_POST['annee']
                ]);
                $errors = "Enregistrement effectuez!";
            }
        }
        $this->render('Attribution.attribution',compact('form','form1','cours','errors','etudiant'));
    }
    public function listAttribution()
    {
        $list = $this->Etudiant->oneDistinct();

        $this->render('attribution.listAttribution',compact('list'));
    }
    public function showList()
    {
        $list = $this->Cours->listAttributionCours($_GET['filiere']);

        $this->render('attribution.showList',compact('list'));
    }
    public function cours()
    {
        $list = $this->Attribution->list($_GET['id']);
        $etudiant = $this->Etudiant->find($_GET['id']);
        
        $this->render('attribution.Lc',compact('list','etudiant'));
    }
    public function deleteA()
    {
        if (!empty($_POST)) 
        {
            $id = $_POST['idE'];
            $this->Attribution->delete($_POST['Aid']);
            header("Location:index.php?p=Lc&id=$id");
        }
        $this->render('attribution.deleteAttribution');
    }
}