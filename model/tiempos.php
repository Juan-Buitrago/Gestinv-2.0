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

    public function pedidos($id_viaje, $doc_mercurio, $estado, $aprovicionador, $destino, $horapedido, $minutopedido, $horasalida, $minutosalida, $horallegada, $minutollegada) {

        $sql = "INSERT INTO viajes_pedidos VALUES ('','$id_viaje','$doc_mercurio','$estado','$aprovicionador','$destino','$horapedido:$minutopedido','$horasalida:$minutosalida','$horallegada:$minutollegada')";
        $query = $this->Conexion->eject($sql);
        return $this->loadPedidos($id_viaje);

    }

}
