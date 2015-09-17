<?php

session_start();
require_once '../model/vehiculos.php';

$controlador = new Vehiculos();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"):
        include '../view/forms/frmVehiculosCrear.php';
        break;
    case("frmEditar"):

        break;
    case("frmConsultar"):

        break;
    case("frmEliminar"):

        break;
    case("saveVehiculos"):

        $save = $controlador->saveVehiculo($_REQUEST['placa'], $_REQUEST['cedula'], $_REQUEST['nombre']);
        if ($save == 1) {
            echo "<h1>Almacenado Correctamente";
        } elseif ($save == 0) {
            echo "<h1>Ocurrio un error en el proceso</h1>";
        }
        break;
}


