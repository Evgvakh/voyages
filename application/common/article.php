<?php

class Article {    
    public $id;
    public $title;
    public $content;
    public $image;
    public $categoriesID = [];
    public $authorID;

    public function __construct($id, $title, $content, $img = null, $catID = null, $author = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $img;
        $this->categoriesID = $catID;
        $this->authorID = $author;
    }
}