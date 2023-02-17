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

    public function adduserAction($data) {        
        $login = htmlspecialchars($data['login']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $role = 'user';
        $this->model->addUser($login, $email, $password, $role);
        session_start();
        $_SESSION['logged_user'] = ucfirst($login);
        header('Location: http://localhost/voyages/articles');
    }

    public function signinAction($data) {        
        session_start();
        $_SESSION['logged_user'] = $data['login'];
        header('Location: http://localhost/voyages/articles');
    }

}