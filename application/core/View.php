<?php
class View
{

    public $controller;

    public $action;

    public function __construct($route, $action_name)
    {
        $this->controller = $route;
        $this->action = $action_name;
    }
    public function generate($page_title, $page_content, $data = null, $comment_data = null)
    {        
        require 'application/views/default/default.php';
    }

}