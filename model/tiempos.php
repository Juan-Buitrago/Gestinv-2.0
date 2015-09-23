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

    public function graficas($inicio, $final) {

        /*Consulta Destino*/ $destinos = $this->Conexion->eject("SELECT destinos.`des_nombre` AS 'Destino', count(viajes_pedidos.`fk_des_id`) AS 'Cantidad' FROM  destinos LEFT JOIN viajes_pedidos ON destinos.`pk_des_id` = viajes_pedidos.`fk_des_id` GROUP BY (destinos.`des_nombre`) ORDER BY `des_nombre`");
        
        while($row = $this->Conexion->fetch_assoc($destinos)){
            
            $result[] = $row;
        }
        
        
        return $result;
        
        /* Montes */ $consulta[0] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Carlos Montes'");
        /* Montoya */ $consulta[1] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Andres Montoya'");
        /* Jimenez */ $consulta[2] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Jorge Jimenez'");
        /* Angel */ $consulta[3] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Angel Gonzales'");
        /* Andres H */$consulta[4] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Andres Herrera'");
        /* Reprocesos */$consulta[5] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Reprocesos'");
        /* Turno Mañana */$consulta[6] = $this->Conexion->eject("SELECT COUNT(`via_turno`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' and '$final' and via_turno = 'Manana'");
        /* Turno Tarde */$consulta[7] = $this->Conexion->eject("SELECT COUNT(`via_turno`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' and '$final' and via_turno = 'Tarde'");
        /* STO-611 Mañana */$consulta[22] = $this->Conexion->eject("SELECT COUNT(`fk_pla_id`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' AND '$final' AND fk_pla_id = 'STO-611' AND via_turno = 'Manana'");
        /* STO-611 Tarde */$consulta[23] = $this->Conexion->eject("SELECT COUNT(`fk_pla_id`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' AND '$final' AND fk_pla_id = 'STO-611' AND via_turno = 'Tarde'");
        /* KUL-510 Mañana */$consulta[24] = $this->Conexion->eject("SELECT COUNT(`fk_pla_id`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' AND '$final' AND fk_pla_id = 'KUL-510' AND via_turno = 'Manana'");
        /* KUL-510 Tarde */$consulta[25] = $this->Conexion->eject("SELECT COUNT(`fk_pla_id`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' AND '$final' AND fk_pla_id = 'KUL-510' AND via_turno = 'Tarde'");
        /* Pedido Normal */$consulta[26] = $this->Conexion->eject("SELECT COUNT(`via_ped_condicion`) AS cantidad FROM `viajes_pedidos` INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id`  WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_condicion` = 'Normal'");
        /* Pedido Critico */$consulta[27] = $this->Conexion->eject("SELECT COUNT(`via_ped_condicion`) AS cantidad FROM `viajes_pedidos` INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id`  WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_condicion` = 'Critico'");

        /*
        for ($cont = 0; $cont <= count($consulta); $cont++) {

            while ($row = $this->Conexion->fetch_assoc(@$consulta[$cont])) {
                $resultado[] = $row;
            }
        }
        return $resultado;*/
    }

    public function excel($inicio, $final) {

        $conexion = new mysqli('localhost', 'root', '', 'gestinv', 3306);
        if (mysqli_connect_errno()) {
            printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
            exit();
        }
        $consulta = "
                SELECT 
                viajes.`pk_via_id` AS 'Viaje', 
                viajes.`fk_pla_id` AS 'Placa',
                viajes.`via_fecha` AS 'Fecha',
                viajes.`via_turno` AS 'Turno',
                viajes_pedidos.`pk_via_ped_id` AS 'Pedido',
                viajes_pedidos.`via_ped_doc_mercurio` AS 'Doc Mercurio',
                viajes_pedidos.`via_ped_condicion` AS 'Condicion',
                viajes_pedidos.`via_ped_aprovicionador` AS 'Aprovicionador',
                viajes_pedidos.`via_ped_destino` AS 'Destino',
                viajes_pedidos.`via_ped_hora_pedido` AS 'Hora Pedido',
                viajes_pedidos.`via_ped_hora_salida` AS 'Hora Salida',
                viajes_pedidos.`via_ped_hora_llegada` AS 'Hora Llegada',
                viajes_pedidos.`via_ped_observacion` AS 'Observacion',
                FROM viajes INNER JOIN viajes_pedidos
                ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id`
                WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final'";

        $resultado = $conexion->query($consulta);
        if ($resultado->num_rows > 0) {

            date_default_timezone_set('America/Mexico_City');

            if (PHP_SAPI == 'cli')
                die('Este archivo solo se puede ver desde un navegador web');

            /** Se agrega la libreria PHPExcel */
            require_once '../lib/excel/Excel.php';

            // Se crea el objeto PHPExcel
            $objPHPExcel = new PHPExcel();

            // Se asignan las propiedades del libro
            $objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
                    ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
                    ->setTitle("Reporte de tiempos")
                    ->setSubject("Reporte de tiempos")
                    ->setDescription("Reporte de tiempos")
                    ->setKeywords("Reporte de tiempos")
                    ->setCategory("Reporte excel");

            $tituloReporte = "Relación de tiempos en despachos";
            $titulosColumnas = array('Viaje', 'Placa', 'Fecha', 'Turno', 'Pedido', 'Doc Mercurio', 'Condicion', 'Aprovicionador', 'Destino', 'Hora Pedido', 'Hora Salida', 'Hora Llegada', 'Observacion');

            $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:Q1');

            // Se agregan los titulos del reporte 15
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', $tituloReporte)
                    ->setCellValue('A3', $titulosColumnas[0])
                    ->setCellValue('B3', $titulosColumnas[1])
                    ->setCellValue('C3', $titulosColumnas[2])
                    ->setCellValue('D3', $titulosColumnas[3])
                    ->setCellValue('E3', $titulosColumnas[4])
                    ->setCellValue('F3', $titulosColumnas[5])
                    ->setCellValue('G3', $titulosColumnas[6])
                    ->setCellValue('H3', $titulosColumnas[7])
                    ->setCellValue('I3', $titulosColumnas[8])
                    ->setCellValue('J3', $titulosColumnas[9])
                    ->setCellValue('K3', $titulosColumnas[10])
                    ->setCellValue('L3', $titulosColumnas[11])
                    ->setCellValue('M3', $titulosColumnas[12]);

            //Se agregan los datos de los pedidos
            $i = 4;
            while ($fila = $resultado->fetch_array()) {
                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $i, $fila['Viaje'])
                        ->setCellValue('B' . $i, $fila['Placa'])
                        ->setCellValue('C' . $i, $fila['Fecha'])
                        ->setCellValue('D' . $i, $fila['Turno'])
                        ->setCellValue('E' . $i, $fila['Pedido'])
                        ->setCellValue('F' . $i, $fila['Doc Mercurio'])
                        ->setCellValue('G' . $i, $fila['Condicion'])
                        ->setCellValue('H' . $i, $fila['Aprovicionador'])
                        ->setCellValue('I' . $i, $fila['Destino'])
                        ->setCellValue('J' . $i, $fila['Hora Pedido'])
                        ->setCellValue('K' . $i, $fila['Hora Salida'])
                        ->setCellValue('L' . $i, $fila['Hora Llegada'])
                        ->setCellValue('M' . $i, $fila['Observacion']);
                $i++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name' => 'Verdana',
                    'bold' => true,
                    'italic' => false,
                    'strike' => false,
                    'size' => 16,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('argb' => 'FF220835')
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );

            $estiloTituloColumnas = array(
                'font' => array(
                    'name' => 'Arial',
                    'bold' => true,
                    'color' => array(
                        'rgb' => '000000')
                )
            );
            $estiloInformacion = new PHPExcel_Style();

            $estiloInformacion->applyFromArray(
                    array(
                        'font' => array(
                            'name' => 'Arial',
                            'color' => array(
                                'rgb' => '000000'
                            ))
            ));

            $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A3:Q3')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:Q" . ($i - 1));

            for ($i = 'A'; $i <= 'Q'; $i++) {
                $objPHPExcel->setActiveSheetIndex(0)
                        ->getColumnDimension($i)->setAutoSize(TRUE);
            }

            // Se asigna el nombre a la hoja
            $objPHPExcel->getActiveSheet()->setTitle('Tiempos');

            // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
            $objPHPExcel->setActiveSheetIndex(0);


            // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Reporte_de_tiempos.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
            exit;
        } else {
            print_r('No hay resultados para mostrar');
        }
    }

}
