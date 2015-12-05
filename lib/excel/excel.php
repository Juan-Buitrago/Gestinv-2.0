<?php

$inicio = $_REQUEST['inicio'];
$final = $_REQUEST['fin'];

$conexion = new mysqli('localhost', 'root', 'root', 'gestinv', 3306);
if (mysqli_connect_errno()) {
    printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    exit();
}
$consulta = "
SELECT 
viajes.`pk_via_id` AS 'viaje',
viajes.`fk_pla_id`,
viajes.`via_fecha`,
viajes.`via_turno`,
empleados.`emp_primer_nombre`,
empleados.`emp_primer_apellido`,
viajes_pedidos.`pk_via_ped_id`,
viajes_pedidos.`via_ped_doc_mercurio`,
viajes_pedidos.`via_ped_condicion`,
aprovicionadores.`apr_nombre`,
destinos.`des_nombre`,
viajes_pedidos.`via_ped_hora_pedido`,
viajes_pedidos.`via_ped_hora_salida`,
viajes_pedidos.`via_ped_hora_llegada`,
TIMEDIFF (viajes_pedidos.`via_ped_hora_salida`,viajes_pedidos.`via_ped_hora_pedido`) AS tiempo_reaccion,
TIMEDIFF (viajes_pedidos.`via_ped_hora_llegada`,viajes_pedidos.`via_ped_hora_salida`) AS tiempo_descargue,
viajes_pedidos.`via_ped_observacion`
FROM viajes INNER JOIN empleados
ON viajes.`fk_emp_id` = empleados.`pk_emp_id`
INNER JOIN viajes_pedidos 
ON viajes.`pk_via_id` = viajes_pedidos.`fk_via_id`
INNER JOIN aprovicionadores 
ON viajes_pedidos.`fk_apr_id` = aprovicionadores.`pk_apr_id` 
INNER JOIN destinos
ON viajes_pedidos.`fk_des_id` = destinos.`pk_des_id`
WHERE viajes.`via_fecha` BETWEEN '$inicio' AND '$final'";



$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {

    date_default_timezone_set('America/Mexico_City');

    if (PHP_SAPI == 'cli')
        die('Este archivo solo se puede ver desde un navegador web');

    /** Se agrega la libreria PHPExcel */
    require_once 'PHPExcel/PHPExcel.php';

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
    $titulosColumnas = array('Viaje', 'Placa', 'Fecha', 'Turno', 'Despachador', 'Pedido', 'Doc Mercurio', 'Condicion', 'Aprovicionador', 'Destino', 'Hora Pedido', 'Hora Salida', 'Hora Llegada', 'Tiempo Reaccion', 'Tiempo Descargue', 'Observacion');

    $objPHPExcel->setActiveSheetIndex(0)
            ->mergeCells('A1:P1');

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
            ->setCellValue('P3', $titulosColumnas[15]);

    //Se agregan los datos de los pedidos
    $i = 4;
    while ($fila = $resultado->fetch_array()) {
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $fila['viaje'])
                ->setCellValue('B' . $i, $fila['fk_pla_id'])
                ->setCellValue('C' . $i, $fila['via_fecha'])
                ->setCellValue('D' . $i, $fila['via_turno'])
                ->setCellValue('E' . $i, $fila['emp_primer_nombre'] ." ". $fila['emp_primer_apellido'])
                ->setCellValue('F' . $i, $fila['pk_via_ped_id'])
                ->setCellValue('G' . $i, $fila['via_ped_doc_mercurio'])
                ->setCellValue('H' . $i, $fila['via_ped_condicion'])
                ->setCellValue('I' . $i, $fila['apr_nombre'])
                ->setCellValue('J' . $i, $fila['des_nombre'])
                ->setCellValue('K' . $i, $fila['via_ped_hora_pedido'])
                ->setCellValue('L' . $i, $fila['via_ped_hora_salida'])
                ->setCellValue('M' . $i, $fila['via_ped_hora_llegada'])
                ->setCellValue('N' . $i, $fila['tiempo_reaccion'])
                ->setCellValue('O' . $i, $fila['tiempo_descargue'])
                ->setCellValue('P' . $i, $fila['via_ped_observacion']);
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

    $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A3:P3')->applyFromArray($estiloTituloColumnas);
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:P" . ($i - 1));

    for ($i = 'A'; $i <= 'P'; $i++) {
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
?>