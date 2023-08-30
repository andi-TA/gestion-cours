<?php

namespace Core\Auth;

use App;
use Core\Database\MysqlDatabase;

class DBauth{

    private $db;
    private static $_instance;

    public function __construct(MysqlDatabase  $db)
    {
        $this->db = $db;
    }

    public static function getInstance()
    {
        if(self::$_instance === null)
            self::$_instance = new DBauth(App::getInstance()->getDb());
        
            return self::$_instance;
    }
    
    public function login($mail,$password)
    {
        $user = $this->db->prepare("SELECT * FROM Administration WHERE mail = ?", [$mail], null, true);
      
        if($user)
        {
            if ($user->mail === $mail) 
            {
                  if ($user->mdp === sha1($password)) 
                  {
                      $_SESSION["auth"] = $user->id;
                      return "ok";
                  } 
                  else 
                  {
                    return "Mot de pass erroné";
                  }
            } 
            else 
            {
                return "Identifiant non valide";
            }
        } 
        else 
        {
            return "Identifiant non valide";
        }
    }

    public function getUserId()
    {
        if ($this->logged())
        {
            return $_SESSION['auth'];
            return true;
        }
        return false;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
    
    public function logout()
    {
        session_destroy();
        return true;
    }

}