<?php

class User {
    
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

