<?php

require_once 'global.php';

class conexion {

    private $conexion;

    public function connect() {

        $this->conexion = mysql_connect(HOST, USER, PASSWORD);
        $this->conexion = mysql_select_db(DATABASE);
    }

    public function disconnect() {

        return $this->conexion = mysql_close($this->conexion);
    }

    public function eject($sql) {

        return mysql_query($sql);
    }

    function fetch_assoc($result) {
        if (!is_resource($result))
            return false;
        return mysql_fetch_assoc($result);
    }

}

?>