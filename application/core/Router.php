<?php
class Router
{
    static function start()
    {   
        //Par defaut
        $controller = 'Main';
        $action = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // Nom du controlleur
        if (!empty($routes[2])) {
            $controller = ucfirst($routes[2]);
            $_SESSION['page'] = $controller;
        }

        // Nom de l'action
        if (!empty($routes[3])) {
            $action = $routes[3];
        }

        //nom de l'index (pour l'article unique)
        if (!empty($routes[4])) {
            $id = $routes[4];
        } else {
            $id = 0;
        }

        // Concat pour definir les noms des fichiers controlleurs
        $model_name = $controller . 'Model';
        $controller_name = $controller . 'Controller';
        $action_name = $action . 'Action';

        // Rajout de Modele (si besoin)
        $model_file = $model_name . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        // Saisie de ficher de controlleur
        $controller_file = $controller_name . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;            
        } else {
            Router::ErrorPage404();
        }

        if(isset($_FILES['size']) && $_FILES['size'] > 0) {}

        // Creation du controlleur
        $controller = new $controller_name($controller, $action, $model_name, $id);

        if (method_exists($controller, $action_name)) {            
            if(isset($_POST)) {
                if(isset($_FILES['image']['size']) && $_FILES['image']['size'] > 0) {
                    $controller->$action_name($_POST, $_FILES['image']);
                } else {
                    $controller->$action_name($_POST); 
                }                               
            } else {
                $controller->$action_name();
            }                        
        } else {
            Router::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}