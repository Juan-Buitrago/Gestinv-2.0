<?php

require_once 'database.php';

class tiempos {

    private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }

    public function loadEmpleados() {
        $empleados = "SELECT * FROM empleados";
        $consult = $this->Conexion->eject($empleados);
        while ($row = $this->Conexion->fetch_assoc($consult)) {

            $result[] = $row;
        }
        return @$result;
    }

    public function loadViaje($id) {

        $sql = "SELECT * FROM viajes WHERE pk_via_id = $id";
        $query = $this->Conexion->eject($sql);
        while ($row = $this->Conexion->fetch_assoc($query)) {

            $result['viaje'] = $row;
        }
        return $result;
    }

    public function loadPedidos($id) {

        $sql = "SELECT * FROM viajes_pedidos WHERE fk_via_id = $id";
        $query = $this->Conexion->eject($sql);
        while ($row = $this->Conexion->fetch_assoc($query)) {

            $result[] = $row;
        }
        return $result;
    }
    public function loadDestinos(){
        
        $sql = "SELECT * FROM destinos";     
        $query = $this->Conexion->eject($sql);
        while($row = $this->Conexion->fetch_assoc($query)){
            $result[]= $row;     
        }
        return $result;
    }
    
    public function loadAprovicionadores(){
        
        $sql = "SELECT * FROM aprovicionadores";
        $query = $this->Conexion->eject($sql);
        while($row = $this->Conexion->fetch_assoc($query)){
            $result[]= $row;     
        }
        return $result;
    }
    

    public function viajes($fecha, $placa, $despachador, $turno) {

        $usuario = $_SESSION['username'];

        $sql = "INSERT INTO viajes VALUES('','$placa','$fecha','$turno','$despachador','1')";
        $query = $this->Conexion->eject($sql);
        $consult = "SELECT MAX(pk_via_id) as id FROM viajes";
        $consecutivo = $this->Conexion->eject($consult);
        while ($row = $this->Conexion->fetch_assoc($consecutivo)) {

            $id = $row['id'];
        }
        return $this->loadViaje($id);
    }

    public function pedidos($id_viaje, $doc_mercurio, $estado, $aprovicionador, $destino, $horapedido, $horasalida, $horallegada, $observacion) {

        $sql = "INSERT INTO viajes_pedidos VALUES ('','$id_viaje','$doc_mercurio','$estado','$aprovicionador','$destino','$horapedido','$horasalida','$horallegada','$observacion')";
        $query = $this->Conexion->eject($sql);
        return $this->loadPedidos($id_viaje);
    }

    public function graficas($grafica,$inicio, $final) {

        switch ($grafica){
         case(1):
          /*Consulta Destino*/ $consulta = $this->Conexion->eject("SELECT destinos.`des_nombre` AS 'Destino', count(viajes_pedidos.`fk_des_id`) AS 'Cantidad' FROM  destinos LEFT JOIN viajes_pedidos ON destinos.`pk_des_id` = viajes_pedidos.`fk_des_id` GROUP BY (destinos.`des_nombre`) ORDER BY `des_nombre`");
             break;
         case(2):
          /*Consulta Aprovicionadores*/ $consulta = $this->Conexion->eject("SELECT aprovicionadores.`apr_nombre` AS 'Aprovicionadores', COUNT(viajes_pedidos.`fk_des_id`) AS 'Cantidad' FROM  aprovicionadores LEFT JOIN viajes_pedidos ON aprovicionadores.`pk_apr_id` = viajes_pedidos.`fk_apr_id` GROUP BY (aprovicionadores.`apr_nombre`) ORDER BY `apr_nombre`");
             break;     
        }          
           while($row = $this->Conexion->fetch_assoc($consulta)){
            
            $result[] = $row;
        }
        
        return $result;
    }

    public function excel($inicio, $final) {

    }
}
