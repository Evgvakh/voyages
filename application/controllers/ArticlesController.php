<?php

require_once 'application/core/Controller.php';
require_once 'application/core/View.php';
class ArticlesController extends Controller
{
    public function indexAction()
    {
        $data = $this->model->getData();
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('ARTICLES', $content, $data);
    }

    public function showOneAction()
    {        
        $data = $this->model->getOne($this->id_article);
        $comment_data = $this->model->getComments($this->id_article);
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('ARTICLE', $content, $data, $comment_data);
    }

    public function sortAction() {
        $data = $this->model->getSorted($this->id_article);
        $content = 'application/views/articles/index.php';
        $this->view->generate('ARTICLE', $content, $data);
    }

    public function editAction($data, $file) {
        $title = $data['title'];
        $category = (int) $data['category'];
        $content = $data['content'];
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/voyages/img/';
        $img = 'img/'.$file['name'];

        move_uploaded_file($file['tmp_name'], $uploadDir.$file['name']);
        
        $this->model->editArticle($this->id_article, $title, $content, $img, $category);

        header('Location: http://localhost/voyages/articles/showOne/'.$this->id_article);
    }

    public function deleteAction($id) {
        $this->model->deleteArticle($this->id_article);
        header('Location: http://localhost/voyages/articles');
    }

    public function addCommentAction($data) {
        $content =  $data['content'];
        $user_id = (int) $data['user_id'];
        $this->model->addComment($user_id, $this->id_article, $content);
        header('Location: http://localhost/voyages/articles/showOne/'.$this->id_article);
    }

}