<?php

require_once 'application/core/Controller.php';
require_once 'application/core/View.php';
class ArticlesController extends Controller
{
    
    public function showAction()
    {
        $data = $this->model->getData();          
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        echo '</br> CONTENT ON ArticlesContent: ' . $content;
        $this->view->generate('ARTICLES', $content, $data);
    }
}