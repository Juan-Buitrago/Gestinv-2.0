<?php

session_start();
require_once '../model/aprovicionadores.php';

$controlador = new aprovicionadores();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"):
        include '../view/forms/frmAprovicionadoresCrear.php';
        break;
    case("frmEditar"):

        break;
    case("frmConsultar"):

        break;
    case("frmEliminar"):

        break;
    case("saveAprovicionador"):

        $save = $controlador->saveAprovicionador($_REQUEST['nombre']);
        if ($save == 1) {
            echo "<h1>Almacenado Correctamente";
        } elseif ($save == 0) {
            echo "<h1>Ocurrio un error en el proceso</h1>";
        }
        break;
}


