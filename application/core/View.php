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
    { //$page_content sera affichee sur la page views/default/default.php              
        // dans $data y aura le contenu (resulats des requetes)

        // extract($data);        
        require 'application/views/default/default.php';
    }

}