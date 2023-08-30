<?php

use App\Controller\Admin\AdminController;
use App\Controller\AttributionController;
use App\Controller\EtudiantController;
use App\Controller\GestionCoursController;
use App\Controller\CoursController;

/***
 * chemin Root
 * 
 * return @url
 */

define("ROOT",dirname(__DIR__));
define( 'WEBROOT', str_replace('\\','/',dirname(__DIR__) . '/public'));


/*---------------App---------------*/
require ROOT . '/app/App.php';
App::getInstance()->loadAutoload();
/*---------------App---------------*/

/*----------------------------------*/
if(isset($_GET['p']))
    $p = $_GET['p'];
else
    $p = 'login';
/*-----------------------------------*/

/**
 * Definition Controller
 * 
 * return Root
 * 
 */
ob_start();
    
if($p === "login")
{
    $controller = new AdminController();
    $controller->login();
}
elseif($p === 'administration.inscription')
{
    $controller = new AdminController();
    $controller->Inscription();
}
elseif($p === "index")
{
    $controller = new GestionCoursController();
    $controller->index();
}
elseif($p === "AjoutEtudiant")
{
    $controller = new EtudiantController();
    $controller->AjoutEtudiant();
}
elseif($p === "listeInscriptions")
{
    $controller = new AttributionController();
    $controller->listAttribution();
}
elseif($p === "AjoutCours")
{
    $controller = new CoursController();
    $controller->AjoutCours();
}
elseif($p === "Attribution")
{
    $controller = new AttributionController();
    $controller->AttributionCours();
}
elseif($p === "editCours")
{
    $controller = new CoursController();
    $controller->edit();
} 
elseif ($p === "editEtudiant") 
{
    $controller = new EtudiantController();
    $controller->edit();
}
elseif($p === "deleteCours")
{
    $controller = new CoursController();
    $controller->delete();
} 
elseif ($p === "deleteEtudiant") 
{
    $controller = new EtudiantController();
    $controller->delete();
}
elseif($p === "logout")
{
    $controller = new AdminController();
    $controller->logout();
}
elseif($p === "listeInscriptions")
{
    $controller = new GestionCoursController();
}
elseif($p === "showList")
{
    $controller = new AttributionController();
    $controller->showList();
}
elseif ($p === "Lc")
{
    $controller = new AttributionController();
    $controller->cours();
}
elseif($p === "etm")
{
    $controller = new EtudiantController();
    $controller->manque();
}
elseif($p === "cm")
{
    $controller = new CoursController();
    $controller->manque();
}
elseif($p === 'deleteAttribution')
{
    $controller = new AttributionController();
    $controller->deleteA();
}