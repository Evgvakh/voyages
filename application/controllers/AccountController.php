<?php
require_once 'application/core/Controller.php';
require_once 'application/core/View.php';
class AccountController extends Controller {
    
    public function loginAction() {
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('LOGIN PAGE', $content);
    }

    public function registerAction()
    {
        $content = 'application/views/' . $this->route . '/' . $this->action . '.php';
        $this->view->generate('REGISTER PAGE', $content);
    }
}