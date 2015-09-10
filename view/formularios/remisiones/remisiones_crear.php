<!DOCTYPE html>
<html>
    <head>
        <title>Gestinv 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/login.css">
        <script type="application/javascript" language="javascript" src="view/js/jquery.js"></script>
        <script type="application/javascript" language="javascript" src="view/js/ajax.js"></script>
        <link rel="shortcut icon" href="../../img/favicon.ico">
    </head>
    <body>
<h1>Registrar Remision</h1><hr/>
<form name="saveRemision" action ="remisiones" method="POST" autocomplete="off">
    <table style="text-align:left" >
        <tr>
            <td>Orden de Despacho:</td><td></td>
        </tr>
        <tr>
            <td>Tipo de Movimiento:</td>
            <td>Remision Manual</td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td></td>
        </tr>
        <tr>
            <td>Placa:</td>
            <td><input type ="text" name="placa"  required></td>
        </tr>  
        <tr>
            <td>Id Sak:</td>
            <td><input type ="text" name="id_sak" required></td>                                    
        </tr>
        <tr>    
            <td>Observacion:</td>
        </tr>
    </table>
    <table>
        <tr>
            <td><textarea rows="4" cols="50" name="observacion"  required></textarea></td>
        </tr>
    </table>

    <table>
        <tr>
            <td><button>Guardar</button></td>
        </tr>
    </table>
</form>
    </body>
</html>
