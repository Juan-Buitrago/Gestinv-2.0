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
        $sql = "SELECT * FROM usuarios";
        $query = $this->conexion->eject($sql);
        while ($usuarios = $this->conexion->fetch_assoc($query)) {

            if ($username == $usuarios['usu_username'] && $password == $usuarios['usu_password']) {

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
    
    public function loadUsuario($usuario){
        
        $sql = "SELECT * FROM usuarios WHERE usu_username='$usuario'";
        $query= $this->conexion->eject($sql);
        while($row = $this->conexion->fetch_assoc($query)){
            
            $datos[]=$row;
        }
        return $datos;
    }
    

}
