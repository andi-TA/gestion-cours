<?php 

namespace App\Controller;

use App;
use App\Controller\Admin\AppController;
use Core\HTML\ReForm;

class EtudiantController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Etudiant');
        $this->loadModel('Attribution');
    }
    public function AjoutEtudiant()
    {
        $donnee = \App::getInstance();
        $errors = null;
        $etudiant = $this->Etudiant->AllException();
        $countCours = $this->Etudiant->rowCount();
        
        if (!empty($_POST)) 
        {
            if($countCours->rowCount > 0)
            {
                if($etudiant->Nom == strtoupper($_POST['Anom']) && $etudiant->Prenom == ucfirst($_POST['Aprenom']))
                {
                    $errors .= "Nom et prenom deja enregistrer veuillez le changer";
                }
                elseif($donnee->filtreDonnees($etudiant->Numero) == $_POST['Anumero'])
                {
                    $errors .= "Numero non valide veuiller le channger";
                } 
                else 
                {
                    $inscrit = $this->Etudiant->insert([
                        'Nom' => strtoupper($donnee->filtreDonnees($_POST['Anom'])),
                        'Prenom' => ucfirst($donnee->filtreDonnees($_POST['Aprenom'])),
                        'Sexe' => ($_POST['sexe']),
                        'DateNaissance' => $donnee->filtreDonnees($_POST['Adn']),
                        'LieuNaissance' => $donnee->filtreDonnees($_POST['Aln']),
                        'Numero' => $donnee->filtreDonnees($_POST['Anumero']),
                        'Adresse' => $donnee->filtreDonnees($_POST['Aadresse']),
                        'Filiere' => ucfirst($donnee->filtreDonnees($_POST['Afiliere'])),
                    ]);
                    $errors = "Enregistrement effectuer";
                }
            }
            else 
            {
                $inscrit = $this->Etudiant->insert([
                    'Nom' => strtoupper($donnee->filtreDonnees($_POST['Anom'])),
                    'Prenom' => ucfirst($donnee->filtreDonnees($_POST['Aprenom'])),
                    'Sexe' => ($_POST['sexe']),
                    'DateNaissance' => $donnee->filtreDonnees($_POST['Adn']),
                    'LieuNaissance' => $donnee->filtreDonnees($_POST['Aln']),
                    'Numero' => $donnee->filtreDonnees($_POST['Anumero']),
                    'Adresse' => $donnee->filtreDonnees($_POST['Aadresse']),
                    'Filiere' => ucfirst($donnee->filtreDonnees($_POST['Afiliere'])),
                ]);
                $errors = "Enregistrement effectuer";
            }
        }
        $form = new ReForm();
        $this->render('Etudiants.addEtudiants',compact('form','errors'));
    }
    public function delete()
    {
        $form = new ReForm();
        if (!empty($_POST)) {
            $this->Etudiant->delete($_POST['id']);
            $this->Attribution->delete($_POST['id'],true);
            header("Location:index.php?p=index");
        }
       
        // $this->render('Etudiants.deleteEtudiants', compact('form'));
    }
    public function edit()
    {
        $errors = null;
        $etudiant = $this->Etudiant->find($_GET['id']);
        $form = new ReForm($etudiant);
        $donnee = \App::getInstance();

        if (!empty($_POST)) 
        {
            $etudiant = $this->Etudiant->AllException();
            
            $inscrit = $this->Etudiant->update($_GET['id'],[
                'Nom' => strtoupper($donnee->filtreDonnees($_POST['Anom'])),
                'Prenom' => ucfirst($donnee->filtreDonnees($_POST['Aprenom'])),
                'Sexe' => ($_POST['sexe']),
                'DateNaissance' => $donnee->filtreDonnees($_POST['Adn']),
                'LieuNaissance' => $donnee->filtreDonnees($_POST['Aln']),
                'Numero' => $donnee->filtreDonnees($_POST['Anumero']),
                'Adresse' => $donnee->filtreDonnees($_POST['Aadresse']),
                'Filiere' => $donnee->filtreDonnees($_POST['Afiliere']),
            ]);
            header('location:index.php?p=index');
        }
        $this->render('Etudiants.addEtudiants', compact('form', 'errors'));
    }
    public function manque()
    {
        $etudiant = $this->Etudiant->all();
        $attribution = $this->Attribution->all();

        $etudiantId = $this->Etudiant->parseTableId($etudiant,'id');
        $attrEtudiantID = $this->Etudiant->parseTableId($attribution, 'id_etudiant');
        
        $trie = App::getInstance()->triDonnees($etudiantId,$attrEtudiantID);
        $nom = $this->Etudiant->etudiantPC($trie);

        $this->render("Etudiants.etudiantM",compact('nom'));
    }

}
