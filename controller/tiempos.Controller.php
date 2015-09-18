<?php

session_start();
require_once '../model/tiempos.php';

$controlador = new tiempos();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"): 
        include '../view/forms/frmTiemposViajes.php';
        
        break;
    

}
