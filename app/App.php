<?php

use App\Autoloader;
use Core\Config;
use Core\Autoloader as CoreAutoloader;
use Core\Database\MysqlDatabase;

class App{
    
    private static $_instance;
    private $db_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
            self::$_instance = new App();
        
            return self::$_instance;
    }
    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');

        if ($this->db_instance === null) 
        {
            $this->db_instance =  new Mysqldatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }   
    public function loadAutoload()
    {
        session_start();

        require ROOT . '/app/Autoloader.php';
        Autoloader::register();

        require ROOT . '/core/Autoloader.php';
        CoreAutoloader::register();
    }
    public function getTable($name)
    {
        $class_name = 'App\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDb());
    }
    public function filtreDonnees($donnees)
    {
        $donnees = trim($donnees);
        $donnees = strip_tags($donnees);
        $donnees = stripslashes($donnees);

        return $donnees;
    }
    public static function asset($path)
    {
        $asset = explode('\\', ROOT);
        $asset = end($asset);
        return '/'.$asset."/public".$path;
    }

    /**
     * 
     * methode de tri données
     * trie d'etudiant et de cours dans la table attribution_cours
     * s'il existe
     * 
     */
    
    public function triDonnees($etudiantId,$attrEtudiantId)
    {
        $res = [];
        $n = 0;
        $sort = false;
        
        for ($i = 0; $i < count($etudiantId); $i++) 
        {
            for ($j = 0; $j < count($attrEtudiantId); $j++) 
            {
                if ($i == (count($etudiantId) - 1) && $etudiantId[$i] == $attrEtudiantId[$j]) {
                    $sort = true;
                    break;
                }
                if ($etudiantId[$i] == $attrEtudiantId[$j]) {
                    $i++;
                    $j = 0;
                }
            }
            if ($sort) 
            {
                break;
            } 
            else
            {
                $res[$n] = $etudiantId[$i];
                $n++;
            }
        }
        return $res;
    }
}