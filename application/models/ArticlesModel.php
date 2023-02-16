<?php

class ArticlesModel
{       
    public function getData()
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }

        $sql = "SELECT * FROM articles ORDER BY date DESC";
        $req = $pdo->prepare($sql);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);        
        return $res;
    }

    public function getOne($id)
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT * FROM articles WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));

        $res = $req->fetchAll();        
        return $res;
    }   

    public function getSorted($id)
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT * FROM articles WHERE id_category = :id ORDER BY date DESC";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));

        $res = $req->fetchAll();        
        return $res;
    }

    public function addArticle($title, $content, $img, $id_cat, $user_id)
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }

        $sql = "INSERT INTO articles (titre, contenu, img, id_category, id_user) VALUES (:title, :content, :img, :id_cat, :id_user)";
        $req = $pdo->prepare($sql);
        $req->execute(array('title' => $title, 'content' => $content, 'img' => $img, 'id_cat' => $id_cat, 'id_user' => $user_id));        
    }

    public function editArticle($id, $title, $content, $image, $id_cat) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }        
        $sql = "UPDATE articles SET titre = :title, contenu = :content, img = :image, id_category =  :id_cat WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->bindValue(':id', $id);
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':image', $image);
        $req->bindValue(':id_cat', $id_cat);
        
        $req->execute(); 
    }

    public function deleteArticle($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }        
        $sql = "DELETE FROM articles WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->bindValue(':id', $id);        
        
        $req->execute(); 
    }

    public function getComments($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
        $sql = "SELECT * FROM commentaires WHERE id_article = :id ORDER BY created DESC";
        $req = $pdo->prepare($sql);
        $req->execute(array('id' => $id));

        $res = $req->fetchAll();        
        return $res;
    }

    public function addComment($id_user, $id_article, $content) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }        
        $sql = "INSERT INTO commentaires (id_user, id_article, contenu) VALUES (:id_user, :id_article, :contenu)";
        $req = $pdo->prepare($sql);
        $req->bindValue(':id_user', $id_user);
        $req->bindValue(':id_article', $id_article);         
        $req->bindValue(':contenu', $content); 
        $req->execute(); 
    }

    public function editComment($id, $content) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }        
        $sql = "UPDATE commentaires SET contenu = :content WHERE id = :id";
        $req = $pdo->prepare($sql);
        
        $req->execute(array('content' => $content, 'id' => $id)); 
    }
    
    public function deleteComment($id) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }        
        $sql = "DELETE FROM commentaires WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->bindValue(':id', $id);        
        
        $req->execute(); 
    }
}