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
        <td><strong>Aprovicionador: </strong><select name ="aprovicionador"><option value="Carlos Montes">Carlos Montes</option><option value="Andres Montoya">Andres Montoya</option><option value="Angel Gonzales">Angel Gonzales</option><option value="Juan Pablo Betancourt">Juan Pablo Betancourt</option><option value="Jorge Jimenez">Jorge Jimenez</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option></select></td>
    </tr>
    <tr>
        <td><strong>Destino: </strong> <select name ="destino"><option value="Linea 1">Linea 1</option><option value="Linea 2">Linea 2</option><option value="Linea 3">Linea 3</option><option value="Linea 4">Linea 4</option><option value="Auxiliar Linea 1">Auxiliar Linea 1</option><option value="Auxiliar Linea 2">Auxiliar Linea 2</option><option value="Auxiliar Linea 3">Auxiliar Linea 3</option><option value="Auxiliar Metales">Auxiliar Metales</option><option value="Caja Control">Caja Control</option><option value="Compresores">Compresores</option><option value="Spin Fine">Spin Fine</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option><option value="Lamina">Lamina</option></select></td>
    </tr>
    <tr>
        <td><strong>Hora pedido: </strong> h<input type ="text" name ="horaPedido" size ="4px"required/>:m<input type ="text" name ="minutoPedido"size ="4px" required/></td>
        <td><strong>Hora salida: </strong> h<input type ="text" name ="horaSalida"size ="4px" required/>:m<input type ="text" name ="minutoSalida"size ="4px" required/></td>
        <td><strong>Hora llegada: </strong>h<input type ="text" name ="horaLlegada" size ="4px" required />:m<input type ="text" name ="minutoLlegada" size ="4px" required/></td>
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
        echo "<td>".$row['via_ped_aprovicionador']."</td>";
        echo "<td>".$row['via_ped_destino']."</td>";
        echo "<td>".$row['via_ped_condicion']."</td>";
        echo "<td>".$row['via_ped_hora_pedido']."</td>";
        echo "<td>".$row['via_ped_hora_salida']."</td>";
        echo "<td>".$row['via_ped_hora_llegada']."</td>";
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
        <td><strong>Aprovicionador: </strong><select name ="aprovicionador"><option value="Carlos Montes">Carlos Montes</option><option value="Andres Montoya">Andres Montoya</option><option value="Angel Gonzales">Angel Gonzales</option><option value="Juan Pablo Betancourt">Juan Pablo Betancourt</option><option value="Jorge Jimenez">Jorge Jimenez</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option></select></td>
    </tr>
    <tr>
        <td><strong>Destino: </strong> <select name ="destino"><option value="Linea 1">Linea 1</option><option value="Linea 2">Linea 2</option><option value="Linea 3">Linea 3</option><option value="Linea 4">Linea 4</option><option value="Auxiliar Linea 1">Auxiliar Linea 1</option><option value="Auxiliar Linea 2">Auxiliar Linea 2</option><option value="Auxiliar Linea 3">Auxiliar Linea 3</option><option value="Auxiliar Metales">Auxiliar Metales</option><option value="Caja Control">Caja Control</option><option value="Compresores">Compresores</option><option value="Spin Fine">Spin Fine</option><option value="Andres Herrera">Andres Herrera</option><option value="Reprocesos">Reprocesos</option><option value="Lamina">Lamina</option></select></td>
    </tr>
    <tr>
        <td><strong>Hora pedido: </strong> h<input type ="text" name ="horaPedido" size ="4px"required/>:m<input type ="text" name ="minutoPedido"size ="4px" required/></td>
        <td><strong>Hora salida: </strong> h<input type ="text" name ="horaSalida"size ="4px" required/>:m<input type ="text" name ="minutoSalida"size ="4px" required/></td>
        <td><strong>Hora llegada: </strong>h<input type ="text" name ="horaLlegada" size ="4px" required />:m<input type ="text" name ="minutoLlegada" size ="4px" required/></td>
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
}
?>
