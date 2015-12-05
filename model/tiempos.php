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
        
         $sql ="SELECT 
                viajes.`pk_via_id`,
                viajes.`via_fecha`,
                viajes.`fk_pla_id`,
                viajes.`via_turno`,
                empleados.`emp_primer_nombre`,
                empleados.`emp_primer_apellido`
                FROM viajes 
                INNER JOIN empleados
                ON viajes.`fk_emp_id` = empleados.`pk_emp_id` 
                WHERE pk_via_id = $id";
         
        $query = $this->Conexion->eject($sql);
        while ($row = $this->Conexion->fetch_assoc($query)) {

            $result['viaje'] = $row;
        }
        return $result;
    }

    public function loadPedidos($id) {

        $sql = "SELECT 
                aprovicionadores.`apr_nombre`,
                destinos.`des_nombre`,
                viajes_pedidos.`via_ped_condicion`,
                viajes_pedidos.`via_ped_hora_pedido`,
                viajes_pedidos.`via_ped_hora_salida`,
                viajes_pedidos.`via_ped_hora_llegada`,
                TIMEDIFF (viajes_pedidos.`via_ped_hora_salida`,viajes_pedidos.`via_ped_hora_pedido`) AS tiempo_reaccion,
                TIMEDIFF (viajes_pedidos.`via_ped_hora_llegada`,viajes_pedidos.`via_ped_hora_salida`) AS tiempo_descargue
                FROM aprovicionadores
                INNER JOIN viajes_pedidos
                ON aprovicionadores.`pk_apr_id` = viajes_pedidos.`fk_apr_id`
                INNER JOIN destinos
                ON viajes_pedidos.`fk_des_id` = destinos.`pk_des_id`
                WHERE fk_via_id = $id";
        
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

        $usuario = $_SESSION['usu_id'];

        $sql = "INSERT INTO viajes VALUES('','$placa','$fecha','$turno','$despachador','$usuario')";
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
          /*Consulta Destino*/ $consulta = $this->Conexion->eject("SELECT destinos.`des_nombre` AS 'Destino', COUNT(viajes_pedidos.`fk_des_id`) AS 'Cantidad' FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` LEFT JOIN destinos  ON viajes_pedidos.`fk_des_id` = destinos.`pk_des_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' GROUP BY (destinos.`des_nombre`) ORDER BY `des_nombre`");
             break;
         case(2):
          /*Consulta Aprovicionadores*/ $consulta = $this->Conexion->eject("SELECT aprovicionadores.`apr_nombre` AS 'Aprovicionadores', COUNT(viajes_pedidos.`fk_des_id`) AS 'Cantidad' FROM  viajes INNER JOIN viajes_pedidos on viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` LEFT JOIN aprovicionadores ON aprovicionadores.`pk_apr_id` = viajes_pedidos.`fk_apr_id` WHERE viajes.`via_fecha` between '$inicio' and '$final' GROUP BY (aprovicionadores.`apr_nombre`) ORDER BY `apr_nombre`");
             break;
         case(3):
          /*Consulta Cant Pedidos Normal*/ $consulta = $this->Conexion->eject("SELECT COUNT(viajes_pedidos.`via_ped_condicion`) normal FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_condicion` = 'Normal'");   
             break;
         case(4):
          /*Consulta Cant Pedidos Normal*/ $consulta = $this->Conexion->eject("SELECT COUNT(viajes_pedidos.`via_ped_condicion`) critico FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_condicion` = 'Critico'");   
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
