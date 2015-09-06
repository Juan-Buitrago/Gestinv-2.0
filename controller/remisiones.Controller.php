<?php

require_once 'model/remisiones.php';

class RemisionesController {

    private $model;

    public function __CONSTRUCT() {

        $this->model = new Remisiones();
    }

    public function frmRemision() {
        require_once 'view/formularios/remisiones/remisiones_crear.php';
    }

    public function frmConsulta() {
        require_once 'view/formularios/remisiones/remisiones_consulta.php';
    }

    public function frmEditar() {
        require_once 'view/formularios/remisiones/remisiones_editar.php';
    }

    public function frmEliminar() {
        require_once 'view/formularios/remisiones/remisiones_eliminar.php';
    }

    public function saveRemision() {

        $process = 0; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        // se incopora la vista.
        require_once 'view/index.php';
        $save = $this->model->SaveHeader($_REQUEST['placa'], $_REQUEST['id_sak'], $_REQUEST['observacion']);
        require_once 'view/formularios/remisiones/remisiones_resultados.php';
    }

    public function saveArticulos() {

        $process = 1; // determina el formulario de resultado a mostrar en remisiones_resultados.php
        // se incopora la vista.
        require_once 'view/index.php';
        $save = $this->model->SaveArticle($_REQUEST['id'], $_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['cantidad']);
        require_once 'view/formularios/remisiones/remisiones_resultados.php';
    }

    public function impresion() {

        $printHeader = $this->model->loadHeader($_REQUEST['id']);
        $printArticle = $this->model->loadArticles($_REQUEST['id']);
        require_once 'view/formularios/remisiones/remisiones_impresion.php';
    }

    public function consult() {

        if (empty($_REQUEST['id'])) {

            $process = 3; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $consult = $this->model->consult($_REQUEST['fecha_inicial'], $_REQUEST['fecha_final']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        } else {

            $process = 2; // determina el formulario de resultado a mostrar en remisiones_resultados.php
            // se incopora la vista.
            require_once 'view/index.php';
            $header = $this->model->loadHeader($_REQUEST['id']);
            $article = $this->model->loadArticles($_REQUEST['id']);
            require_once 'view/formularios/remisiones/remisiones_resultados.php';
        }
    }

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
