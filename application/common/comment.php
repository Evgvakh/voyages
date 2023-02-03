<?php

class Comment
{
    public $id;
    public $id_user;
    public $id_article;
    public $created;
    public $updated;
    public $contenu;


    public function __construct($id, $id_user, $id_article, $created, $updated, $contenu)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
        $this->created = $created;
        $this->updated = $updated;
        $this->contenu = $contenu;
    }
}
?>