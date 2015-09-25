<?php

session_start();
require_once '../model/tiempos.php';
require_once '../model/remisiones.php';

$tiempos = new tiempos();
$remisiones = new Remisiones();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"):
        $placas = $remisiones->loadPlacas();
        $empleados = $tiempos->loadEmpleados();
        include '../view/forms/frmTiemposViajes.php';
        break;

    case("frmConsulta"):
        include '../view/forms/frmTiemposConsulta.php';
        break;
    
    case("frmGraficas"):
        include '../view/forms/frmTiemposGraficas.php';
        break;

    case("saveViaje"):
        $process = 0;
        $save = $tiempos->viajes($_REQUEST['fecha'], $_REQUEST['placa'], $_REQUEST['despachador'], $_REQUEST['turno']);
        $destinos = $tiempos->loadDestinos();
        $aprovicionadores = $tiempos->loadAprovicionadores();
        include '../view/forms/frmTiemposResultados.php';
        break;

    case("savePedido"):
        $process = 1;
        $pedidos = $tiempos->pedidos($_REQUEST['id_viaje'], $_REQUEST['doc_mercurio'], $_REQUEST['estado'], $_REQUEST['aprovicionador'], $_REQUEST['destino'], $_REQUEST['horaPedido'],$_REQUEST['horaSalida'],$_REQUEST['horaLlegada'],$_REQUEST['observacion']);
        $viaje = $tiempos->loadViaje($_REQUEST['id_viaje']);
        $destinos = $tiempos->loadDestinos();
        $aprovicionadores = $tiempos->loadAprovicionadores();
        include '../view/forms/frmTiemposResultados.php';
        break;
    case("consulta"):
        $consulta = $tiempos->excel($_REQUEST['inicio'], $_REQUEST['fin']);
        break;
    
    case("graficas"):
        $process = 2;
        $destinos = $tiempos->graficas(1,$_REQUEST['inicio'], $_REQUEST['fin']);
        $aprovicionadores = $tiempos->graficas(2,$_REQUEST['inicio'], $_REQUEST['fin']);
        include '../view/forms/frmTiemposResultados.php';
        break;
}
