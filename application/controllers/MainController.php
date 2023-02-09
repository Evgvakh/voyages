<?php

require_once 'application/core/Controller.php';
require_once 'application/core/View.php';
class MainController extends Controller {      

    public function indexAction() {        
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('MAIN PAGE', $content);
    }
}