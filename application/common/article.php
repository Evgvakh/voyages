<?php

class Article {    
    public $id;
    public $title;
    public $content;
    public $image;
    public $categoriesID;
    public $authorID;
    public $date;

    public function __construct($id, $title, $content, $img = null, $catID = null, $author = null, $date = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $img;
        $this->categoriesID = $catID;
        $this->authorID = $author;
        $this->date = $date; 
    }
    static function getCategoryName($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT nom FROM categories, articles WHERE articles.id = :id AND categories.id = articles.id_category";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));
        $res = $req->fetch();        
        return $res[0];
    }
    static function getUserName($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT login FROM utilisateurs, articles WHERE articles.id = :id AND utilisateurs.id = articles.id_user";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));
        $res = $req->fetch();        
        return $res[0];
    }
}