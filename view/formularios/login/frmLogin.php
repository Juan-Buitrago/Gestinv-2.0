<!DOCTYPE html>
<html>
    <head>
        <title>Gestinv 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="view/css/login.css">
        <link rel="shortcut icon" href="view/img/favicon.ico">

    </head>
    <body>
        <div class="mensaje"><h1>INICIAR SESSION</h1></div>
        <div class="contenido"> 
            <div id ="login">
                <form action="?action=login&petition=validalogin" method="POST">
                <table width="100%">
                    <tr>
                        <td><input type="text" name ="username" placeholder="Usuario" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name ="password" placeholder="Contraseña" autocomplete="off" required="hola"></td>
                    </tr>
                    <tr>
                        <td><button>INGRESAR</button></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </body>
</html>
