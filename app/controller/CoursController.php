<?php

namespace App\Controller;

use App\Controller\Admin\AppController;
use Core\HTML\ReForm;
use App;

class CoursController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Cours');
        $this->loadModel('Attribution');
    }
    public function AjoutCours()
    {
        $errors = false;

        if(!empty($_POST))
        {
            $donnee = \App::getInstance();
            $inscrit = $this->Cours->insert([
                'Cours' => $donnee->filtreDonnees($_POST['Ccours']),
                'Professeur' => ucfirst($donnee->filtreDonnees($_POST['Cprof']))
            ]);
            $errors = true;
        }
        $form = new ReForm();
        $this->render('cours.addCours',compact('form','errors'));
    }

    public function delete()
    {
        $form = new ReForm();

        if (!empty($_POST)) 
        {
            $this->Cours->delete($_POST['id']);
            $this->Attribution->delete($_POST['id'],true);
            header("Location:index.php?p=index");
        }
    
        // $this->render('cours.deleteCours',compact('form'));
    }

    public function edit()
    {
        $errors = false;
        if (!empty($_POST)) 
        {
            $result = $this->Cours->update($_GET['id'], [
               'Cours' => $_POST['Ccours'],
               'Professeur' => $_POST['Cprof'],
            ]);
            header('location:index.php?p=index');
        }
        $cours = $this->Cours->find($_GET['id']);

        $form = new ReForm($cours);

        $this->render('cours.editCours', compact('form','cours'));
    }
    public function manque()
    {
        $cours = $this->Cours->all();
        $attribution = $this->Attribution->all();

        $coursId = $this->Cours->parseTableId($cours, 'id');
        $attrCoursId = $this->Attribution->parseTableId($attribution, 'id_cours');

        $trie = App::getInstance()->triDonnees($coursId, $attrCoursId);
        $nom = $this->Cours->etudiantPC($trie);
  
        $this->render("Cours.coursM", compact('nom'));
    }
}
