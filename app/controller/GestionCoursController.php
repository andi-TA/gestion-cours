<?php

namespace App\Controller;

use App\Controller\Admin\AppController;

class GestionCoursController extends AppController{
    
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Etudiant');
        $this->loadModel('Cours');
        $this->loadModel('Attribution');
    }
    public function index()
    {
        $etudiants = $this->Etudiant->all();
        $cours = $this->Cours->all();
        $inscrie = $this->Attribution->InscriptionCours();
        $this->render('index.index',compact('etudiants','cours','inscrie'));
    } 
    
}