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
        <td><strong>Despachador: </strong>' . $save['viaje']['fk_emp_id'] . '</td>
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
        <td><strong>Aprovicionador: </strong><select name ="aprovicionador"><option value="Carlos Montes">Carlos Montes</option><option value="Andres Montoya">Andres Montoya</option><option value="Angel Gonzales">Angel Gonzales</option><option value="Jorge Jimenez">Jorge Jimenez</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option></select></td>
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
        <td><strong>Despachador: </strong>' . $viaje['viaje']['fk_emp_id'] . '</td>
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
        echo "<td>" . $row['via_ped_aprovicionador'] . "</td>";
        echo "<td>" . $row['via_ped_destino'] . "</td>";
        echo "<td>" . $row['via_ped_condicion'] . "</td>";
        echo "<td>" . $row['via_ped_hora_pedido'] . "</td>";
        echo "<td>" . $row['via_ped_hora_salida'] . "</td>";
        echo "<td>" . $row['via_ped_hora_llegada'] . "</td>";
        echo "<td>Pendiente</td>";
        echo "<td>Pendiente</td>";
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
        <td><strong>Aprovicionador: </strong><select name ="aprovicionador"><option value="Carlos Montes">Carlos Montes</option><option value="Andres Montoya">Andres Montoya</option><option value="Angel Gonzales">Angel Gonzales</option><option value="Jorge Jimenez">Jorge Jimenez</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option></select></td>
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

    echo"
    <script type='text/javascript'>
$(function () {
    $('#grafica1').highcharts({
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Carlos Montes: " . $graficas[0]['cantidad'] . " ',
                y:" . $graficas[0]['cantidad'] . "
            }, {
                name: 'Andres Montoya: " . $graficas[1]['cantidad'] . " ',
                y:" . $graficas[1]['cantidad'] . ",
            }, {
                name: 'Jorge Jimenez: " . $graficas[2]['cantidad'] . " ',
                y: " . $graficas[2]['cantidad'] . "
            }, {
                name: 'Angel Gonzales: " . $graficas[3]['cantidad'] . " ',
                y: " . $graficas[3]['cantidad'] . "
            }, {
                name: 'Andres Herrera: " . $graficas[4]['cantidad'] . " ',
                y: " . $graficas[4]['cantidad'] . "
            }, {
                name: 'Reprocesos: " . $graficas[5]['cantidad'] . " ',
                y: " . $graficas[5]['cantidad'] . "
            }]
        }]
    });
});
</script>";

//Grafica de los pedidos por turno  (Mañana - Tarde)

    echo'<script type="text/javascript">';
    echo"$(function () {
                 $('#grafica2').highcharts({
                    chart: {
                        backgroundColor:'transparent',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Graficas pedidos por turno'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Cantidad Pedidos',
                        data: [";
    echo "['Mañana: " . $graficas[6]['cantidad'] . " =>'," . $graficas[6]['cantidad'] . "],";
    echo "['Tarde: " . $graficas[7]['cantidad'] . " =>'," . $graficas[7]['cantidad'] . "],";
    echo'            
                            ]
                    }]
                });
            });
                </script>';

    // Grafica de torta por pedidos por destino 
    echo'<script type="text/javascript">';
    echo"$(function () {
                 $('#grafica3').highcharts({
                    chart: {
                        backgroundColor:'transparent',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Graficas pedidos por destino'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Cantidad Pedidos',
                        data: [";
    echo "['Andres Herrera (" . $graficas[0]['Cantidad'] . ")'," . $graficas[0]['Cantidad'] . "],";
    echo "['Auxiliar Linea 1 (" . $graficas[1]['Cantidad'] . ")'," . $graficas[1]['Cantidad'] . "],";
    echo "['Auxiliar Linea 2 (" . $graficas[2]['Cantidad'] . ")'," . $graficas[2]['Cantidad'] . "],";
    echo "['Auxiliar Linea 3 (" . $graficas[3]['Cantidad'] . ")'," . $graficas[3]['Cantidad'] . "],";
    echo "['Auxiliar Metales (" . $graficas[4]['Cantidad'] . ")'," . $graficas[4]['Cantidad'] . "],";
    echo "['Caja Control (" . $graficas[5]['Cantidad'] . ")'," . $graficas[5]['Cantidad'] . "],";
    echo "['Compresores (" . $graficas[6]['Cantidad'] . ")'," . $graficas[6]['Cantidad'] . "],";
    echo "['Lamina (" . $graficas[7]['Cantidad'] . ")'," . $graficas[7]['Cantidad'] . "],";
    echo "['Linea 1 (" . $graficas[8]['Cantidad'] . ")'," . $graficas[8]['Cantidad'] . "],";
    echo "['Linea 2 (" . $graficas[9]['Cantidad'] . ")'," . $graficas[9]['Cantidad'] . "],";
    echo "['Linea 3 (" . $graficas[10]['Cantidad'] . ")'," . $graficas[10]['Cantidad'] . "],";
    echo "['Linea 4 (" . $graficas[11]['Cantidad'] . ")'," . $graficas[11]['Cantidad'] . "],";
    echo "['Reprocesos(" . $graficas[12]['Cantidad'] . ")'," . $graficas[12]['Cantidad'] . "],";
    echo "['Spin Five (" . $graficas[13]['Cantidad'] . ")'," . $graficas[13]['Cantidad'] . "],";
    echo'            
                        ]
                    }]
                });
            });
                </script>';

    //Grafica lineal por destino .

    echo'<script type="text/javascript">';
    echo "$(function () {
                        $('#grafica4').highcharts({
                            chart: {
                                backgroundColor:'transparent',
                                type: 'bar'
                            },
                            title: {
                                text: 'Grafica Por Destino'
                            },
                            xAxis: {
                                categories: ['Linea 1', 'Linea 2', 'Linea 3', 'Linea 4', 'Auxiliar Linea 1', 'Auxiliar Linea 2', 'Auxiliar Linea 3', 'Auxiliar Metales', 'Caja Control', 'Compresores', 'Spin Fine', 'Andres Herrera', 'Reprocesos', 'Lamina']
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
                                name: 'Pedidos',
                                data: [" . $graficas[8]['cantidad'] . "," . $graficas[9]['cantidad'] . "," . $graficas[10]['cantidad'] . "," . $graficas[11]['cantidad'] . "," . $graficas[12]['cantidad'] . "," . $graficas[13]['cantidad'] . "," . $graficas[14]['cantidad'] . "," . $graficas[15]['cantidad'] . "," . $graficas[16]['cantidad'] . "," . $graficas[17]['cantidad'] . "," . $graficas[18]['cantidad'] . "," . $graficas[19]['cantidad'] . "," . $graficas[20]['cantidad'] . "," . $graficas[21]['cantidad'] . "]
                            }]
                        });
                    });
		       </script>";
    // Grafica Por Vehiculos   
    echo '<script type="text/javascript">';
    echo "
                $(function () {
                    $('#grafica5').highcharts({
                        chart: {
                            backgroundColor:'transparent',
                            type: 'column'
                        },
                        title: {
                            text: 'Grafica Vehiculos'
                        },
                        xAxis: {
                            categories: ['STO-611', 'KUL-510']
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Total envios'
                            }
                        },
                        tooltip: {
                            pointFormat: '<span style=" . "color:{series.color}" . ">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                            shared: true
                        },
                        plotOptions: {
                            column: {
                                stacking: 'percent'
                            }
                        },
                        series: [{
                            name: 'Tarde',
                            data: [" . $graficas[23]['cantidad'] . "," . $graficas[25]['cantidad'] . "]
                        }, {
                            name: 'Mañana',
                            data: [" . $graficas[22]['cantidad'] . "," . $graficas[24]['cantidad'] . "]
                        }]
                    });
                });
                </script>";

    // Grafica de totales de pedidos Criticos y normales  
    echo'<script type="text/javascript">';
    echo" $(function () {
                  $('#grafica6').highcharts({
                    chart: {
                        backgroundColor:'transparent',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Graficas totales pedidos'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Cantidad Pedidos',
                        data: [";
    echo "['Criticos: " . $graficas[27]['cantidad'] . " =>'," . $graficas[27]['cantidad'] . "],";
    echo "['Normal: " . $graficas[26]['cantidad'] . " =>'," . $graficas[26]['cantidad'] . "],";
    echo'            
                              ]
                    }]
                });
            });
               </script>';
    echo"
<div id = 'grafica1' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div><hr/>
<div id = 'grafica2' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div><hr/>
<div id = 'grafica3' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div><hr/>
<div id = 'grafica4' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div><hr/>
<div id = 'grafica5' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div><hr/>
<div id = 'grafica6' style = 'min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>";
}
?>
