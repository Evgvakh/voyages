<?php

class ArticlesModel
{       
    public function getData()
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyage", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }

        $sql = "SELECT * FROM articles";
        $req = $pdo->prepare($sql);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);        
        return $res;
    }

    public function getOne($id)
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyage", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
        echo '</br> ID in getOne function: ' . $id;
        $sql = "SELECT * FROM articles WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));

        $res = $req->fetchAll();        
        return $res;
    }

}