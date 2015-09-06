<?php
session_start();

// se valida si el usuario esta logeado
if (isset($_SESSION['username']) || @$_REQUEST ['action']=="login" && @$_REQUEST['petition'] == "validalogin" ) {

    require_once 'model/database.php';
    $controller = 'home';

//FrontController.
    if (!isset($_REQUEST['action'])) {

        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->home();
    } else {
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['action']);
        $accion = isset($_REQUEST['petition']) ? $_REQUEST['petition'] : 'index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller'; // ucwords convierte la primera letra de la cadena en mayuscula.
        $controller = new $controller;
        // Llama la accion.
        call_user_func(array($controller, $accion));
    }
} else {

    $controller = 'login';
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->frmlogin();
}
?>