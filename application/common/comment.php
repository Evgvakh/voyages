<?php

class Comment
{
    public $id;
    public $id_user;
    public $id_article;
    public $created;    
    public $comment_contenu;


    public function __construct($id, $id_user, $id_article, $created, $contenu)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
        $this->created = $created;        
        $this->comment_contenu = $contenu;
    }

    static function getUserName($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT login FROM utilisateurs, commentaires WHERE commentaires.id = :id AND utilisateurs.id = commentaires.id_user";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));
        $res = $req->fetch();        
        return $res[0];
    }
}
?>