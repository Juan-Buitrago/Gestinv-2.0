<script type="application/javascript" language="javascript" src="/Gestinv-2.0/view/js/jquery.js"></script>
<script type="application/javascript" language="javascript" src="/Gestinv-2.0/view/js/ajax.js"></script>
<h1>Registrar Vehiculo</h1><hr/>
<form name="saveVehiculos" action ="vehiculos.controller.php" method="POST" autocomplete="off">
    <table style="text-align:left" >
        <tr>
            <td>Placa:</td>
            <td><input type ="text" name="placa"  required></td>
        </tr>  
        <tr>
            <td>Cedula:</td>
            <td><input type ="number" name="cedula" required></td>                                    
        </tr>
        <tr>    
            <td>Nombre:</td>
            <td><input type ="text" name="nombre"  required></td>
        </tr>

        <tr>
            <td><button>Guardar</button></td>
        </tr>
    </table>
</form>
</body>
</html>