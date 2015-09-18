<h1>Eliminar Remisiones</h1><hr/>
<p>*Escribe la orden de despacho que desea eliminar*</p>
<form name="eliminar" action ="remisiones.controller.php" method="POST">
    <table style="text-align: left">
        <tr>
            <td><p>Eliminar Por ID: </p></td>
            <td><input type="text" name ="id" placeholder="Ingrese un numero" autocomplete="off" size="20"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><button onclick="processForms()">Eliminar</button></td>
        </tr>
    </table>
</form>



