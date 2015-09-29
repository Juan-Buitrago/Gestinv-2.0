<?php

session_start();
require_once '../model/destinos.php';

$controlador = new destinos();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"):
        include '../view/forms/frmDestinosCrear.php';
        break;
    case("frmEditar"):

        break;
    case("frmConsultar"):

        break;
    case("frmEliminar"):

        break;
    case("saveDestinos"):

        $save = $controlador->saveDestino($_REQUEST['nombre']);
        if ($save == 1) {
            echo "<h1>Almacenado Correctamente";
        } elseif ($save == 0) {
            echo "<h1>Ocurrio un error en el proceso</h1>";
        }
        break;
}


