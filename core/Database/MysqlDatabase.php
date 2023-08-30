<?php

namespace Core\Database;

use PDO;

class MysqlDatabase extends Database{

    private $db_user;
    private $db_host;
    private $db_pass;
    private $db_name;
    private $pdo;

    public function __construct($db_name,$db_user = "root",$db_pass = "",$db_host = "localhost")
    {
        $this->db_user = $db_user;
        $this->db_host = $db_host;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }
    
    public function getPdo()
    {
        if(is_null($this->pdo))    
            $this->pdo = new PDO("mysql:host=localhost;dbname=gestionCours","root","");
        
        return $this->pdo;
    }

    public function query($statement,$class_name = null,$one = false)
    {
        $req = $this->getPdo()->query($statement);
        if (
            strpos($statement, 'UPDATE' === 0) || //trouver le mot UPDATE en 1er position
            strpos($statement, 'INSERT' === 0) || //trouver le mot UPDATE en 1er position
            strpos($statement, 'DELETE' === 0) //trouver le mot UPDATE en 1er position
        ) {
            return $req;
        }
        if ($class_name === null)
            $req->setFetchMode(PDO::FETCH_OBJ);
        else
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one)
            $data = $req->fetch();
        else
            $data = $req->fetchAll();

        return $data;
    }
    public function prepare($statement,$attributes,$class_name = null,$one = false)
    {
        $req = $this->getPdo()->prepare($statement);
        $res = $req->execute($attributes);
        if (
            strpos($statement, 'UPDATE' === 0) || //trouver le mot UPDATE en 1er position
            strpos($statement, 'INSERT' === 0) || //trouver le mot UPDATE en 1er position
            strpos($statement, 'DELETE' === 0) //trouver le mot UPDATE en 1er position
        ) {
            return $res;
        }
        if ($class_name === null)
            $req->setFetchMode(PDO::FETCH_OBJ);
        else
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

}