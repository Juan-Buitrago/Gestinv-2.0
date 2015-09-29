<h1>Registrar Destino</h1><hr/>
<form name="saveDestinos" action ="destinos.controller.php" method="POST" autocomplete="off">
    <table style="text-align:left" >
        <tr>    
            <td>Nombre:</td>
            <td><input type ="text" name="nombre"  required></td>
        </tr>
        <tr>
            <td><button onclick="processForms()">Guardar</button></td>
        </tr>
    </table>
</form>
</body>
</html>