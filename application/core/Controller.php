<?php

class Controller
{
    public $route;
    public $action;
    public $view;
    public $model;
    public $id_article;
    public function __construct($route, $action, $model, $id)
    {
        $this->route = $route;
        $this->action = $action;
        if (file_exists('application/models/' . $model . '.php')) {
            $this->model = new $model;
        }
        $this->id_article = (int) $id;
        $this->view = new View($route, $action);
    }
}