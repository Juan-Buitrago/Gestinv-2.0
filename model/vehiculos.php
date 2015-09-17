<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehiculos
 *
 * @author JBVCOLCD
 */

require_once 'database.php';
class vehiculos {

    private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }

    public function saveVehiculo($placa, $cedula, $nombre) {

        $sql = "insert into placas values('$placa','$cedula','$nombre')";
        $insert = $this->Conexion->eject($sql);

        if(!$insert){      
            return 0;
        }else {
            return 1;
        }
    }

}
