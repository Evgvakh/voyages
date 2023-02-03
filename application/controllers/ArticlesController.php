<?php

require_once 'application/core/Controller.php';
require_once 'application/core/View.php';
class ArticlesController extends Controller
{
    public function showAction()
    {
        $data = $this->model->getData();          
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';        
        $this->view->generate('ARTICLES', $content, $data);
    }

    public function showOneAction()
    {
        echo '</br> ID_ARTICLE at ArticlesController: ' . $this->id_article . ' has type - ', gettype($this->id_article);
        $data = $this->model->getOne($this->id_article);          
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';        
        $this->view->generate('ARTICLES', $content, $data);
    }

}