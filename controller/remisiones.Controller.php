<?php

require_once '../model/remisiones.php';

$controlador = new Remisiones();

@$proceso = $_REQUEST['petition'];

switch ($proceso) {

    case("frmRegistrar"):
        require_once '../view/formularios/remisiones/remisiones_crear.php';
        break;
    case("frmConsulta"):
        require_once '../view/formularios/remisiones/remisiones_consulta.php';
        break;
    case("frmEditar"):
        require_once '../view/formularios/remisiones/remisiones_editar.php';
        break;
    case("frmEliminar"):
        require_once '../view/formularios/remisiones/remisiones_eliminar.php';
        break;

    case("saveRemision"):

        $process = 0; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        $save = $controlador->SaveHeader($_REQUEST['placa'], $_REQUEST['id_sak'], $_REQUEST['observacion']);
        require_once '../view/formularios/remisiones/remisiones_resultados.php';

        break;
    case("saveArticulos"):

        $process = 1; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        $save = $controlador->SaveArticle($_REQUEST['id'], $_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['cantidad']);
        require_once '../view/formularios/remisiones/remisiones_resultados.php';
        break;
    
    case("impresion"):
        
        $printHeader = $controlador->loadHeader($_REQUEST['id']);
        $printArticle = $controlador->loadArticles($_REQUEST['id']);
        require_once '../view/formularios/remisiones/remisiones_impresion.php';
        
        break;
    
    case("consulta"):
        
         if (empty($_REQUEST['id'])) {
  
            $process = 3; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $consult = $controlador->consult($_REQUEST['fecha_inicial'], $_REQUEST['fecha_final']);
            require_once '../view/formularios/remisiones/remisiones_resultados.php';
        } else {
            $process = 2; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            $header = $controlador->loadHeader($_REQUEST['id']);
            $article = $controlador->loadArticles($_REQUEST['id']);
            require_once '../view/formularios/remisiones/remisiones_resultados.php';
        }
        
        break;
    
    case("finalizar"):
        echo "finalizar";
        break;
}

class RemisionesController {

    public function edit() {

        if (empty($_REQUEST['id'])) {

            $process = 5; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $article = $this->model->loadArticle($_REQUEST['id_article']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        } else {
            $process = 4; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $header = $this->model->loadHeader($_REQUEST['id']);
            $article = $this->model->loadArticles($_REQUEST['id']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        }
    }

    public function actualizar() {
        if (empty($_REQUEST['id_article'])) {

            $process = 6; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $update = $this->model->updateHeader($_REQUEST['id'], $_REQUEST['placa'], $_REQUEST['id_sak'], $_REQUEST['observacion']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        } else {

            $process = 6; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $update = $this->model->updateArticle($_REQUEST['id_article'], $_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['cantidad']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        }
    }

    public function delete() {

        $process = 7; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        // se incopora la vista.
        require_once 'view/index.php';
        $delete = $this->model->delete($_REQUEST['id']);
        require_once 'view/formularios/remisiones/remisiones_resultados.php';
    }

}
