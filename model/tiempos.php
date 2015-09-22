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

    public function pedidos($id_viaje, $doc_mercurio, $estado, $aprovicionador, $destino, $horapedido,$horasalida,$horallegada) {

        $sql = "INSERT INTO viajes_pedidos VALUES ('','$id_viaje','$doc_mercurio','$estado','$aprovicionador','$destino','$horapedido','$horasalida','$horallegada')";
        $query = $this->Conexion->eject($sql);
        return $this->loadPedidos($id_viaje);
    }

    public function graficas($inicio, $final) {

        /* Montes */ $consulta[0] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Carlos Montes'");
        /* Montoya */ $consulta[1] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Andres Montoya'");
        /* Jimenez */ $consulta[2] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Jorge Jimenez'");
        /* Angel */ $consulta[3] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Angel Gonzales'");
        /* Andres H */$consulta[4] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Andres Herrera'");
        /* Reprocesos */$consulta[5] = $this->Conexion->eject("SELECT COUNT(`via_ped_aprovicionador`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_aprovicionador` = 'Reprocesos'");
        /* Turno Mañana */$consulta[6] = $this->Conexion->eject("SELECT COUNT(`via_turno`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' and '$final' and via_turno = 'Manana'");
        /* Turno Tarde */$consulta[7] = $this->Conexion->eject("SELECT COUNT(`via_turno`) AS cantidad FROM viajes WHERE via_fecha BETWEEN '$inicio' and '$final' and via_turno = 'Tarde'");
        /* Linea 1 */$consulta[8] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Linea 1'");
        /* Linea 2 */$consulta[9] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Linea 2'");
        /* Linea 3 */$consulta[10] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Linea 3'");
        /* Linea 4 */$consulta[11] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Linea 4'");
        /* Auxiliar linea 1 */$consulta[12] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Auxiliar Linea 1'");
        /* Auxiliar linea 2 */$consulta[13] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Auxiliar Linea 2'");
        /* Auxiliar linea 3 */$consulta[14] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Auxiliar Linea 3'");
        /* Auxiliar Metales */$consulta[15] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Auxiliar Metales'");
        /* Caja Control */$consulta[16] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Caja Control'");
        /* Compresores */$consulta[17] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Compresores'");
        /* Spin Fine */$consulta[18] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Spin Fine'");
        /* Andres Herrera */$consulta[19] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Andres Herrera'");
        /* Reprocesos */$consulta[20] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Reprocesos'");
        /* Lamina */$consulta[21] = $this->Conexion->eject("SELECT COUNT(`via_ped_destino`) AS cantidad FROM viajes_pedidos INNER JOIN viajes ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id` WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final' AND viajes_pedidos.`via_ped_destino` = 'Lamina'");

        for ($cont = 0; $cont <= count($consulta); $cont++) {

            while ($row = $this->Conexion->fetch_assoc(@$consulta[$cont])) {

                $resultado[] = $row;
            }
        }
        return $resultado;
    }

    public function excel($inicio, $final) {

        $consulta = "
	SELECT 
	viajes.`pk_id` AS 'viaje',
	viajes.`placa`,
	viajes.`fecha`,
	viajes.`turno`,
	viajes.`despachador`,
	pedidos.`pk_id`,
        pedidos.`doc_mercurio`,
	pedidos.`condicion`,
	pedidos.`aprovicionador`,
	pedidos.`destino`,
	pedidos.`detalle_material`,
	pedidos.`hora_pedido`,
	pedidos.`hora_salida`,
	pedidos.`hora_llegada`,
	pedidos.`tiempo_reaccion`,
	pedidos.`tiempo_descargue`,
        pedidos.`observacion`
	FROM viajes INNER JOIN pedidos 
	ON viajes.`pk_id` = pedidos.`fk_id_viaje` 
	WHERE fecha BETWEEN '$inicio' AND '$final'";



        $resultado = $this->Conexion->eject($consulta);
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
            $titulosColumnas = array('Viaje', 'Placa', 'Fecha', 'Turno', 'Despachador', 'Pedido', 'Doc Mercurio', 'Condicion', 'Aprovicionador', 'Destino', 'Detalle Material', 'Hora Pedido', 'Hora Salida', 'Hora Llegada', 'Tiempo Reaccion', 'Tiempo Descargue', 'Observacion');

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
                    ->setCellValue('M3', $titulosColumnas[12])
                    ->setCellValue('N3', $titulosColumnas[13])
                    ->setCellValue('O3', $titulosColumnas[14])
                    ->setCellValue('P3', $titulosColumnas[15])
                    ->setCellValue('Q3', $titulosColumnas[16]);

            //Se agregan los datos de los pedidos
            $i = 4;
            while ($fila = $resultado->fetch_array()) {
                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $i, $fila['viaje'])
                        ->setCellValue('B' . $i, $fila['placa'])
                        ->setCellValue('C' . $i, $fila['fecha'])
                        ->setCellValue('D' . $i, $fila['turno'])
                        ->setCellValue('E' . $i, $fila['despachador'])
                        ->setCellValue('F' . $i, $fila['pk_id'])
                        ->setCellValue('G' . $i, $fila['doc_mercurio'])
                        ->setCellValue('H' . $i, $fila['condicion'])
                        ->setCellValue('I' . $i, $fila['aprovicionador'])
                        ->setCellValue('J' . $i, $fila['destino'])
                        ->setCellValue('K' . $i, $fila['detalle_material'])
                        ->setCellValue('L' . $i, $fila['hora_pedido'])
                        ->setCellValue('M' . $i, $fila['hora_salida'])
                        ->setCellValue('N' . $i, $fila['hora_llegada'])
                        ->setCellValue('O' . $i, $fila['tiempo_reaccion'])
                        ->setCellValue('P' . $i, $fila['tiempo_descargue'])
                        ->setCellValue('Q' . $i, $fila['observacion']);
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
