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
        var_dump($res);
        return $res;
    }
}