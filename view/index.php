<!DOCTYPE html>
<html>
    <head>
        <title>Gestinv 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="view/css/style.css">
        <link rel="stylesheet" type="text/css" href="view/css/menu.css">
        <link rel="shortcut icon" href="view/img/favicon.ico">
        <script type="application/javascript" language="javascript" src="view/js/jquery.js"></script>
        <script type="application/javascript" language="javascript" src="view/js/proceso.js"></script>
        <script type="application/javascript" language="javascript" src="view/js/ajax.js"></script>
        <link rel="stylesheet" type="text/css" href="view/js/jquery-ui/jquery-ui.css">
        <script type="application/javascript" language="javascript" src="view/js/jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <header>
            <div class="barra-login"> 
                <div class="float-left">
                    <img src="view/img/emblema.png" width="35">&nbsp
                    <h2>GESTINV 2.0</h2>  
                </div>
                <div class="float-right">
                    <ul>
                        <li>Hola! Juan Buitrago</li>
                        <li><a href="?action=login&petition=unlog">Cerrar Session</a></li>
                        <li><a href="">Ayuda</a></li>
                    </ul>
                </div>
            </div>     
        </header>
        <section>
            <div class="barra-menu-2">
                <div id='cssmenu'>
                    <ul>
                        <li><a href=''><span>Principal</span></a></li>
                        <li><a href='' ><span>Remisiones</span></a>
                            <ul>
                                <li><a href='index.php?action=remisiones&petition=frmRemision' class="loadfrm"><span>Registrar</span></a></li>
                                <li><a href='index.php?action=remisiones&petition=frmConsulta' class="loadfrm"><span>Consultar</span></a></li>
                                <li><a href='index.php?action=remisiones&petition=frmEditar' class="loadfrm"><span>Editar</span></a></li>
                                <li><a href='index.php?action=remisiones&petition=frmEliminar' class="loadfrm"><span>Eliminar</span></a></li>  
                            </ul>
                        </li>
                        <li><a href='#'><span>Tiempos</span></a>
                            <ul>
                                <li><a href='#'><span>Viajes</span></a></li>
                                <li><a href='#'><span>Consultar</span></a></li>
                                <li><a href='#'><span>Graficas</span></a></li>
                                <li><a href='#'><span>Editar</span></a></li>  
                            </ul>
                        </li>
                        <li><a href='#'><span>Empleados</span></a>
                            <ul>
                                <li><a href='#'><span>Crear</span></a></li>
                                <li><a href='#'><span>Editar</span></a></li>
                                <li><a href='#'><span>Consultar</span></a></li>
                                <li><a href='#'><span>Eliminar</span></a></li>  
                            </ul>
                        </li>
                        <li><a href='#'><span>Vehiculos</span></a>
                            <ul>
                                <li><a href='#'><span>Registrar</span></a></li>
                                <li><a href='#'><span>Editar</span></a></li>
                                <li><a href='#'><span>Consultar</span></a></li>
                                <li><a href='#'><span>Eliminar</span></a></li>  
                            </ul>
                        </li>
                    </ul>
                </div>         
            </div>
        </article>
    </section>
    <div class="content"></div>
</body>
</html>