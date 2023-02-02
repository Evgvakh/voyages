<?php 

class Controller {
    public $route;
    public $action;
    public $view;
    public $model;
    public function __construct($route, $action, $model)
    {
        $this->route = $route;
        $this->action = $action;
        $this->model = new $model;        
        $this->view = new View($route, $action);
    }
}