<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Core\Auth\DBauth;
use Core\HTML\ReForm;

/**
 * Class administration 
 * 
 * Authentifiquation Auth
 * 
 */
class AdminController extends AppController{
    
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }
    
    public function login()
    {
        $errors = false;
        if(!empty($_POST))
        {
            $auth = new DBAuth(\App::getInstance()->getDb());
            $verify = $auth->login($_POST['Lmail'],$_POST['Lpass']);
            
            if ($verify === "ok") 
            {
                header('Location:index.php?p=index');
            }
            else 
            {
                $errors = $verify;
            }
        }
        $form = new ReForm();
        $this->render('administration.login',compact('form','errors'));
    }

    public function Inscription()
    {
        $errors = null;
        $donnee = \App::getInstance();
        $countCours = $this->User->rowCount();

        if(!empty($_POST))
        {
            $user = $this->User->AllException();
        
        if($countCours->rowCount > 0)
        {
            if ($user->mail === strtolower($donnee->filtreDonnees($_POST['Imail']))) 
            {
                $errors = "email déja enregistrer veuillez le changer";
            } 
            elseif ($user->mdp == sha1($_POST['Ipass']))
            {
                var_dump(sha1($_POST['Ipass']));
                die;
                $errors = "mot de pass non valide veuillez le changer";
            } 
            elseif ($user->Nom === strtoupper($donnee->filtreDonnees($_POST['Inom']) && $user->Prenom === ucfirst($donnee->filtreDonnees($_POST['Iprenom'])))) 
            {
                $errors = "Nom et prenom déja répertorier veuillez le changer";
            }
            else 
            {
                $inscrit = $this->User->insert([
                    'Nom' => strtoupper($donnee->filtreDonnees($_POST['Inom'])),
                    'Prenom' => ucfirst($donnee->filtreDonnees($_POST['Iprenom'])),
                    'mail' => strtolower($donnee->filtreDonnees($_POST['Imail'])),
                    'mdp' => sha1($_POST['Ipass'])
                ]);
                    $errors = "Inscription réussie </br> cliquer sur le logo";
            }
        }
        else
        {
            $inscrit = $this->User->insert([
                'Nom' => strtoupper($donnee->filtreDonnees($_POST['Inom'])),
                'Prenom' => ucfirst($donnee->filtreDonnees($_POST['Iprenom'])),
                'mail' => strtolower($donnee->filtreDonnees($_POST['Imail'])),
                'mdp' => sha1($_POST['Ipass'])
            ]);
            $errors = "Inscription réussie </br> cliquer sur le logo";
        }
    }
    
        $form = new ReForm();

        $this->render('administration.Inscription',compact('errors','form'));
    }

    public function logout()
    {
        $res = DBAuth::getInstance()->logout();

        if ($res)
            header('Location:index.php?p=login');
    }
}