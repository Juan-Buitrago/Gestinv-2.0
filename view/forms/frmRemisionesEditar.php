<h1>Editar Remisiones</h1><hr/>
<p>*Escriba la orden de despacho que desea editar*</p>
<form name="editar" action ="remisiones.controller.php" method="POST">
    <table style="text-align: left">
        <tr>
            <td><p>Editar Por ID: </p></td>
            <td><input type="text" name ="id" placeholder="Ingrese un numero" autocomplete="off" size="20"></td>

        </tr>
        <tr>
            <td><button onclick="processForms()">Editar</button></td>
        </tr>
    </table>
    <hr/>
</form>