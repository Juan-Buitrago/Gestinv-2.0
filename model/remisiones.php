<?php

require_once 'database.php';

class Remisiones extends conexion {

    private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }

    public function loadHeader($id) {

        $header = "SELECT * FROM remisiones WHERE pk_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result['header'] = $row;
        }
        return @$result;
    }

    public function loadArticles($id) {

        $header = "SELECT * FROM mov_remisiones WHERE fk_rem_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result[] = $row;
        }
        return @$result;
    }

    public function loadArticle($id) {

        $header = "SELECT * FROM mov_remisiones WHERE pk_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result[] = $row;
        }
        return @$result;
    }

    public function SaveHeader($placa, $id_sak, $observacion) {

        //se reciben la informacion por medio del metodo y se crea el query
        $insert = "INSERT INTO remisiones VALUES ('','$placa','$id_sak','" . date("Y-m-d") . "','$observacion','USUARIO')";
        $this->Conexion->eject($insert); // Se inyectan los datos a la base de datos
        // se almacena en un array los datos almacenados y se retornan
        $consult = "SELECT MAX(pk_id) AS id FROM remisiones";
        $consecutive = $this->Conexion->eject($consult);
        while ($row = $this->Conexion->fetch_assoc($consecutive)) {
            $id = $row['id'];
        }
        return $this->loadHeader($id);
    }

    public function SaveArticle($id, $codigo, $descripcion, $cantidad) {

        //se recibe la informacion por medio del metodo y se crea el query
        $insert = "INSERT INTO mov_remisiones VALUES ('','$id','$codigo','$descripcion','$cantidad')";
        $this->Conexion->eject($insert); // Se inyectan los datos a la base de datos
        // se almacena en un array los datos almacenados y se retornan
        $consult = "SELECT * FROM mov_remisiones WHERE fk_rem_id=$id";
        $query = $this->Conexion->eject($consult);
        while ($row = $this->Conexion->fetch_assoc($query)) {

            $array[] = $row;
        }
        $array ['header'] = $this->loadHeader($id);

        return $array;
    }

    public function consult($fecha_inicio, $fecha_final) {

        $consult = "SELECT * FROM remisiones WHERE fecha BETWEEN '$fecha_inicio' and '$fecha_final';";
        $resultados = $this->Conexion->eject($consult);
        while ($row = $this->fetch_assoc($resultados)) {

            $result[] = $row;
        }
        return $result;
    }

    public function updateHeader($id, $placa, $id_sak, $observacion) {

        $update = "UPDATE remisiones SET placa='$placa',id_sak='$id_sak',observacion='$observacion'WHERE pk_id=$id";
        $result = $this->Conexion->eject($update);
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

    public function updateArticle($id, $codigo, $descripcion, $cantidad) {

        $update = "UPDATE mov_remisiones SET codigo='$codigo',descripcion='$descripcion',cantidad='$cantidad' WHERE pk_id=$id";
        $result = $this->Conexion->eject($update);
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }
    public function delete($id){
        
        $deleteHeader ="DELETE FROM remisiones WHERE pk_id = $id";
        $deleteArticles = "DELETE FROM mov_remisiones WHERE fk_rem_id = $id";      
        $result = $this->Conexion->eject($deleteHeader);
        $result = $this->Conexion->eject($deleteArticles);       
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
        
    }

}

?>