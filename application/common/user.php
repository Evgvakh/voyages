<?php

class User {
    public $id;
    public $username;

    public function __construct($id) {
        $this->id = $id; 
    }

    static function getUserNameById($id) {
        
    }

    static function getUserIdByName($name) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT id FROM utilisateurs WHERE login = :name";
        $req = $pdo->prepare($sql);
        $req->execute(array(':name' => $name));
        $res = $req->fetch();        
        return $res[0];
    }
}

