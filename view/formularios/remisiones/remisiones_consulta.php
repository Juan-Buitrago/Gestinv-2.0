<!DOCTYPE html>
<html>
    <head>
        <script type="application/javascript" language="javascript" src="view/js/jquery.js"></script>
        <script type="application/javascript" language="javascript" src="view/js/ajax.js"></script>
    </head>
    <body>
<h1>Consulta De Remisiones</h1><hr/>
<p>*Consulte por alguno de los parametros que vera a continuacion*</p>
<form name="consulta" action ="controller/remisiones.controller.php" method="POST">
    <table style="text-align: left">
        <tr>
            <td><p>Buscar Por ID: </p></td>
            <td><input type="text" name ="id" placeholder="Ingrese un numero" autocomplete="off" size="20"></td>
        </tr>
    </table>
    <hr/>
    <table style="text-align: left">
        <tr>
            <td><p>Buscar Por Fecha.</p></td>
        </tr>
        <tr>
            <td>Inicio:  <input type="date" name ="fecha_inicial" size="20"></td>
            <td>Final:  <input type="date" name ="fecha_final" size="20"></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button>Buscar</button></td>
        </tr>
    </table>
</form>
    </body>
</html>



