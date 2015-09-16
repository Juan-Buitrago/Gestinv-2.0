<?php

require_once 'database.php';

class login {

    private $conexion;

    public function __construct() {
        $this->conexion = new conexion();
        $this->conexion->connect();
    }

    public function validacion($username, $password) {
        $validacion= null;
        $sql = "SELECT usuario,contrasena FROM usuarios";
        $query = $this->conexion->eject($sql);
        while ($usuarios = $this->conexion->fetch_assoc($query)) {

            if ($username == $usuarios['usuario'] && $password == $usuarios['contrasena']) {

                $validacion = 1;
            }
        }
        if ($validacion == 1) {

            return $validacion;
        } else if ($validacion != 0) {
            $validacion = 0;
            return $validacion;
        }
    }

}
