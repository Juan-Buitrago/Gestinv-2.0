<h1>Informe completo de pedidos</h1><hr/>
<form name="consulta" action ="tiempos.Controller.php" method="POST"> 
    <table style="text-align:left">
        <tr>
            <td><strong>Fecha Inicio:</strong><input type ="date" name ="inicio" required/></td>
            <td><strong>Fecha Final:</strong><input type ="date" name ="fin" required/></td>        
        </tr>
        <tr>
            <td><button onclick="processForms()">Generar</button></td>
        </tr>
    </table>
</form>

