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
        echo '</br> ID_ARTICLE at ArticlesController: ' . $this->id_article . ', it has type - ', gettype($this->id_article);
        $data = $this->model->getOne($this->id_article);
        $comment_data = $this->model->getComments($this->id_article);
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('ARTICLES', $content, $data, $comment_data);
    }
}