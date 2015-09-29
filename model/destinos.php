<?php
require_once 'database.php';

class destinos {
   
     private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }

    public function saveDestino($nombre) {

        $sql = "insert into destinos values('','$nombre')";
        $insert = $this->Conexion->eject($sql);

        if(!$insert){      
            return 0;
        }else {
            return 1;
        }
    }
    
    
}
