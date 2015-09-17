<?php

require_once 'database.php';

class Remisiones extends conexion {

    private $Conexion;

    public function __CONSTRUCT() {
        $this->Conexion = new conexion();
        $this->Conexion->connect();
    }
    
    public function loadPlacas(){
        $placas = "SELECT pk_pla_id FROM placas";
        $consult= $this->Conexion->eject($placas);
        while ($row = $this->Conexion->fetch_assoc($consult)){
            
           $result[] = $row; 
        }
        return @$result;      
        
    }

    public function loadHeader($id) {

        $header = "SELECT * FROM remisiones WHERE pk_rem_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result['header'] = $row;
        }
        return @$result;
    }

    public function loadArticles($id) {

        $header = "SELECT * FROM remisiones_articulos WHERE fk_rem_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result[] = $row;
        }
        return @$result;
    }

    public function loadArticle($id) {

        $header = "SELECT * FROM remisiones_articulos WHERE pk_rem_art_id = $id";
        $consult = $this->Conexion->eject($header);
        while ($row = $this->Conexion->fetch_assoc($consult)) {
            $result[] = $row;
        }
        return @$result;
    }

    public function SaveHeader($placa, $id_sak, $observacion) {
        
            $usuario = $_SESSION['username'];
            //se reciben la informacion por medio del metodo y se crea el query
            $insert = "INSERT INTO remisiones VALUES ('','$placa','" . date("Y-m-d") . "','$id_sak','$observacion','1')";
            $this->Conexion->eject($insert); // Se inyectan los datos a la base de datos
            // se almacena en un array los datos almacenados y se retornan
            $consult = "SELECT MAX(pk_rem_id) AS id FROM remisiones";
            $consecutive = $this->Conexion->eject($consult);
            while ($row = $this->Conexion->fetch_assoc($consecutive)) {
                $id = $row['id'];
            }
            return $this->loadHeader($id);
    }

    public function SaveArticle($id, $codigo, $descripcion, $cantidad) {

        //se recibe la informacion por medio del metodo y se crea el query
        $insert = "INSERT INTO remisiones_articulos VALUES ('','$id','$codigo','$descripcion','$cantidad')";
        $this->Conexion->eject($insert); // Se inyectan los datos a la base de datos
        // se almacena en un array los datos almacenados y se retornan
        $consult = "SELECT * FROM remisiones_articulos WHERE fk_rem_id = $id";
        $query = $this->Conexion->eject($consult);
        while ($row = $this->Conexion->fetch_assoc($query)) {

            $array[] = $row;
        }      
        $array ['header'] = $this->loadHeader($id);
        return $array;
    }

    public function consult($fecha_inicio, $fecha_final) {

        $consult = "SELECT * FROM remisiones WHERE rem_fecha BETWEEN '$fecha_inicio' and '$fecha_final';";
        $resultados = $this->Conexion->eject($consult);
        while ($row = $this->fetch_assoc($resultados)) {

            $result[] = $row;
        }
        return $result;
    }

    public function updateHeader($id, $placa, $id_sak, $observacion) {

        $update = "UPDATE remisiones SET fk_pla_id ='$placa',rem_id_sak='$id_sak',rem_observacion='$observacion'WHERE pk_rem_id=$id";
        $result = $this->Conexion->eject($update);
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

    public function updateArticle($id, $codigo, $descripcion, $cantidad) {

        $update = "UPDATE remisiones_articulos SET rem_art_codigo='$codigo',rem_art_descripcion='$descripcion',rem_art_cantidad='$cantidad' WHERE pk_rem_art_id=$id";
        $result = $this->Conexion->eject($update);
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

    public function delete($id) {

        $deleteArticles = "DELETE FROM remisiones_articulos WHERE fk_rem_id = $id";
        $deleteHeader = "DELETE FROM remisiones WHERE pk_rem_id = $id";   
        $result = $this->Conexion->eject($deleteArticles);
        $result = $this->Conexion->eject($deleteHeader);
        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

}

?>