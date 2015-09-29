<?php

require_once 'database.php';

class aprovicionadores {
    
    private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }

    public function saveAprovicionador($nombre) {

        $sql = "insert into aprovicionadores values('','$nombre')";
        $insert = $this->Conexion->eject($sql);

        if(!$insert){      
            return 0;
        }else {
            return 1;
        }
    }
    
    
}
