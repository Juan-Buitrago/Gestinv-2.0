<?php
session_start();
require_once '../model/remisiones.php';

$controlador = new Remisiones();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmCrear"):
        include '../view/forms/frmRemisionesCrear.php';
        break;
    case("frmEditar"):
        include '../view/forms/frmRemisionesEditar.php';
        break;
    case("frmConsultar"):
        include '../view/forms/frmRemisionesConsulta.php';
        break;
    case("frmEliminar"):
        include '../view/forms/frmRemisionesEliminar.php';
        break;

    case("saveRemision"):

        $process = 0; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        $save = $controlador->SaveHeader($_REQUEST['placa'], $_REQUEST['id_sak'], $_REQUEST['observacion']);
        require_once '../view/forms/frmRemisionesResultados.php';

        break;
    case("saveArticulos"):

        $process = 1; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        $save = $controlador->SaveArticle($_REQUEST['id'], $_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['cantidad']);
        require_once '../view/forms/frmRemisionesResultados.php';
        break;

    case("impresion"):

        $printHeader = $controlador->loadHeader($_REQUEST['id']);
        $printArticle = $controlador->loadArticles($_REQUEST['id']);
        require_once '../view/forms/frmRemisionesImpresion.php';
        break;

    case("consulta"):

        if (empty($_REQUEST['id'])) {

            $process = 3; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $consult = $controlador->consult($_REQUEST['fecha_inicial'], $_REQUEST['fecha_final']);
            require_once '../view/forms/frmRemisionesResultados.php';
        } else {
            $process = 2; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $header = $controlador->loadHeader($_REQUEST['id']);
            $article = $controlador->loadArticles($_REQUEST['id']);
            require_once '../view/forms/frmRemisionesResultados.php';
        }

        break;
    case("editar"):

        if (empty($_REQUEST['id'])) {

            $process = 5; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $article = $controlador->loadArticle($_REQUEST['id_article']);
            require_once '../view/forms/frmRemisionesResultados.php';
        } else {

            $process = 4; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $header = $controlador->loadHeader($_REQUEST['id']);
            $article = $controlador->loadArticles($_REQUEST['id']);
            require_once '../view/forms/frmRemisionesResultados.php';
        }
        break;

    case("actualizar"):

        if (empty(@$_REQUEST['id_article'])) {
            $process = 6; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $update = $controlador->updateHeader($_REQUEST['id'], $_REQUEST['placa'], $_REQUEST['id_sak'], $_REQUEST['observacion']);
            require_once '../view/forms/frmRemisionesResultados.php';
        } else {
            $process = 6; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $update = $controlador->updateArticle($_REQUEST['id_article'], $_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['cantidad']);
            require_once '../view/forms/frmRemisionesResultados.php';
        }
        break;
        
    case("eliminar"):
        
         $process = 7; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        $delete = $controlador->delete($_REQUEST['id']);
        require_once '../view/forms/frmRemisionesResultados.php';
        
        break;

    case("finalizar"):
        echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
        break;
}
