<?php

if ($process == 0) {
    echo'
<h1>Registrar Pedidos</h1><hr/>
<p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p><br>
<form name="savePedido" action ="tiempos.Controller.php" method="POST">
<table style="text-align: left">
    <tr>
        <td><strong>Numero de viaje: </strong>' . $save['viaje']['pk_via_id'] . '</td>
    </tr>
    <tr>
        <td><strong>Fecha: </strong>' . $save['viaje']['via_fecha'] . '</td>
    </tr>
    <tr>
        <td><strong>Placa: </strong>' . $save['viaje']['fk_pla_id'] . '</td>
    </tr>
    <tr>
        <td><strong>Despachador: </strong>' . $save['viaje']['emp_primer_nombre'] ." ". $save['viaje']['emp_primer_apellido'].'</td>
    </tr>
    <tr>
        <td><strong>Turno: </strong>' . $save['viaje']['via_turno'] . '</td>
    </tr>
</table>
<hr />

<table style="text-align: left"> 
    <tr>
        <td><strong>Documento mercurio: </strong><input type ="text" name ="doc_mercurio" size="7"/></td>
    </tr>
    <tr>
        <td><strong>Estado del pedido: </strong><select name ="estado"><option value="Normal">Normal</option><option value="Critico">Critico</option></select></td>
    </tr>
    <tr>
        <td>Aprovicionadores:
            <select name="aprovicionador" required><option disabled selected>Seleccione...</option>';

    foreach ($aprovicionadores as $row):
        echo "<option value='" . $row['pk_apr_id'] . "'>";
        echo $row['apr_nombre'];
        echo "</option>";
    endforeach;
    echo'
                </select>
        </td>        
    </tr>
    <tr>
        <td>Destino:
            <select name="destino" required><option disabled selected>Seleccione...</option>';

    foreach ($destinos as $row):
        echo "<option value='" . $row['pk_des_id'] . "'>";
        echo $row['des_nombre'];
        echo "</option>";
    endforeach;
    echo'
                </select>
        </td>
    </tr>
    <tr>
        <td><strong>Hora pedido: </strong><input type="datetime-local" name="horaPedido"></td>
        <td><strong>Hora salida: </strong><input type="datetime-local" name="horaSalida"></td>
        <td><strong>Hora llegada: </strong><input type="datetime-local" name="horaLlegada"></td>
    </tr>                              
    <tr>
        <td colspan ="5" aling="center"><strong>Observacion</strong></td>
    </tr>
    <tr>
        <td colspan ="5"><input type="text" name ="observacion" size="100px"></td>
    </tr>
</table>
<hr />
<table style="text-align: left">
    <tr> 
        <td><input type="hidden" name="id_viaje" value="' . $save['viaje']['pk_via_id'] . '"</td>
        <td><button onclick="processForms()">Guardar</button></td>
        <td><button>Finalizar</button></td>
    </tr>
</table></form>';
} elseif ($process == 1) {
    echo'    
<h1>Registrar Pedidos</h1><hr/>
<p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p><br>
<form name="savePedido" action ="tiempos.Controller.php" method="POST">
<table style="text-align: left">
    <tr>
        <td><strong>Numero de viaje: </strong>' . $viaje['viaje']['pk_via_id'] . '</td>
    </tr>
    <tr>
        <td><strong>Fecha: </strong>' . $viaje['viaje']['via_fecha'] . '</td>
    </tr>
    <tr>
        <td><strong>Placa: </strong>' . $viaje['viaje']['fk_pla_id'] . '</td>
    </tr>
    <tr>
        <td><strong>Despachador: </strong>' . $viaje['viaje']['emp_primer_nombre'] ." ". $viaje['viaje']['emp_primer_apellido'].'</td>
    </tr>
    <tr>
        <td><strong>Turno: </strong>' . $viaje['viaje']['via_turno'] . '</td>
    </tr>
</table>
<hr />';
    echo'<table border ="1">
        <tr>
            <td><strong>APROVICIONADOR</strong></td>
            <td><strong>DESTINO</strong> </td>
            <td><strong>ESTADO</strong></td>
            <td><strong>HORA PEDIDO</strong></td>
            <td><strong>HORA SALIDA</strong></td>
            <td><strong>HORA LLEGADA</strong></td>
            <td><strong>TIEMPO REACCION</strong></td>
            <td><strong>TIEMPO DESCARGUE</strong></td>
        </tr>';

    foreach ($pedidos as $row):
        echo "<tr>";
        echo "<td>" . $row['apr_nombre'] . "</td>";
        echo "<td>" . $row['des_nombre'] . "</td>";
        echo "<td>" . $row['via_ped_condicion'] . "</td>";
        echo "<td>" . $row['via_ped_hora_pedido'] . "</td>";
        echo "<td>" . $row['via_ped_hora_salida'] . "</td>";
        echo "<td>" . $row['via_ped_hora_llegada'] . "</td>";
        echo "<td>" . $row['tiempo_reaccion'] . "</td>";
        echo "<td>" . $row['tiempo_descargue'] . "</td>";
        echo "</tr>";
    endforeach;

    echo'</table><hr/>
<table style="text-align: left"> 
    <tr>
        <td><strong>Documento mercurio: </strong><input type ="text" name ="doc_mercurio" size="7"/></td>
    </tr>
    <tr>
        <td><strong>Estado del pedido: </strong><select name ="estado"><option value="Normal">Normal</option><option value="Critico">Critico</option></select></td>
    </tr>
    <tr>
       <td>Aprovicionadores:
            <select name="aprovicionador" required><option disabled selected>Seleccione...</option>';

    foreach ($aprovicionadores as $row):
        echo "<option value='" . $row['pk_apr_id'] . "'>";
        echo $row['apr_nombre'];
        echo "</option>";
    endforeach;
    echo'
                </select>
        </td>        
</tr>
    <tr>
    <td>Destino:
            <select name="destino" required><option disabled selected>Seleccione...</option>';

    foreach ($destinos as $row):
        echo "<option value='" . $row['pk_des_id'] . "'>";
        echo $row['des_nombre'];
        echo "</option>";
    endforeach;
    echo'
                </select>
        </td>
    </tr>
    <tr>
        <td><strong>Hora pedido: </strong><input type="datetime-local" name="horaPedido"></td>
        <td><strong>Hora salida: </strong><input type="datetime-local" name="horaSalida"></td>
        <td><strong>Hora llegada: </strong><input type="datetime-local" name="horaLlegada"></td>
    </tr>                              
    <tr>
        <td colspan ="5" aling="center"><strong>Observacion</strong></td>
    </tr>
    <tr>
        <td colspan ="5"><input type="text" name ="observacion" size="100px"></td>
    </tr>
</table>
<hr />
<table style="text-align: left">
    <tr> 
        <td><input type="hidden" name="id_viaje" value="' . $viaje['viaje']['pk_via_id'] . '"</td>
        <td><button onclick="processForms()">Guardar</button></td>
    </tr>
</table></form>';
}elseif ($process == 2) {
    echo"<h1>Sistema De Graficas</h1><hr/>";
    echo "
   <script type='text/javascript'>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#grafica1').highcharts({
            chart: {
                backgroundColor:'transparent',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Pedidos Por Destino'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [";

                    foreach ($destinos as $row):
                        echo "{";
                        echo "name: '" . $row['Destino'] . "',";
                        echo "y:" . $row['Cantidad'] . "";
                        echo "},";
                    endforeach;
                    echo"]
            }]
        });
    });
});
		</script>
                <div id='grafica1'></div><hr/>";

    //Grafica lineal por destino .
    echo "
<script type='text/javascript'>;
        $(function () {
                        $('#grafica2').highcharts({
                            chart: {
                                backgroundColor:'transparent',
                                type: 'bar'
                            },
                            title: {
                                text: 'Pedidos Por Destino'
                            },
                            xAxis: {
                                categories: [";
                                    foreach ($destinos as $row):
                                        echo "'";
                                        echo $row['Destino'];
                                        echo "',";
                                    endforeach;
                                    echo "      ]
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total Pedidos'
                                }
                            },
                            legend: {
                                reversed: true
                            },
                            plotOptions: {
                                series: {
                                    stacking: 'normal'
                                }
                            },
                            series: [{
                                      name:'Pedidos',
                                      data:[";
                                foreach ($destinos as $row):
                                    echo $row['Cantidad'];
                                    echo ",";
                                endforeach;
                                echo "]}]
                        });
                    });
		       </script>
    <div id='grafica2'></div><hr/>";

    echo "
   <script type='text/javascript'>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#grafica3').highcharts({
            chart: {
                backgroundColor:'transparent',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Pedidos Por Aprovicionador'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [";

                foreach ($aprovicionadores as $row):
                    echo "{";
                    echo "name: '" . $row['Aprovicionadores'] . "',";
                    echo "y:" . $row['Cantidad'] . "";
                    echo "},";
                endforeach;
                echo"]
            }]
        });
    });
});
		</script>
                <div id='grafica3'></div><hr/>";
}
?>
