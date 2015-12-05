<!DOCTYPE html>
<html>
    <head>
        <title>Gestinv 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="view/css/style.css">
        <link rel="stylesheet" type="text/css" href="view/css/menu.css">
        <link rel="stylesheet" href="view/css/font-awesome.min.css">
        <link rel="shortcut icon" href="../../view/img/favicon.ico">
        <script type="application/javascript" language="javascript" src="view/js/jquery.js"></script>
        <script type="application/javascript" language="javascript" src="view/js/ajax.js"></script>
        <script src="lib/graficas/js/highcharts.js"></script>
        <script src="lib/graficas/js/modules/exporting.js"></script>
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
                        <li>Hola! <?php echo $_SESSION['name']." ". $_SESSION['lastname'] ?></li>
                        <li><i class="fa fa-unlock-alt"></i> <a name="unlog" href="login.Controller.php">Cerrar Session</a></li>
                        <li><i class="fa fa-info"></i> <a href="">Ayuda</a></li>
                    </ul>
                </div>
            </div>     
        </header>
        <section>
            <div class="barra-menu-2">
                <div id="cssmenu">
                    <ul>
                        <li><a href="#"><span><i class="fa fa-desktop"></i> Principal</span></a></li>
                        <li><a href="#"><span><i class="fa fa-book"></i> Remisiones</span></a>
                            <ul>
                                <li><a name="frmCrear" href="remisiones.Controller.php"><span><i class="fa fa-plus-circle"></i> Registrar</span></form></a></li>
                                <li><a name="frmConsultar" href="remisiones.Controller.php"><span><i class="fa fa-calendar"></i> Consultar</span></a></li>
                                <li><a name="frmEditar" href="remisiones.Controller.php"><span><i class="fa fa-pencil"></i> Editar</span></a></li>
                                <li><a name="frmEliminar" href="remisiones.Controller.php"><span><i class="fa fa-trash-o"></i> Eliminar</span></a></li>  
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-truck"></i>  Tiempos</span></a>
                            <ul>
                                <li><a name ="frmCrear" href="tiempos.Controller.php"><span><i class="fa fa-map-marker"></i> Viajes</span></a></li>
                                <li><a name="frmConsulta" href="tiempos.Controller.php"><span><i class="fa fa-calendar"></i> Consultar</span></a></li>
                                <li><a name="frmGraficas" href="tiempos.Controller.php"><span><i class="fa fa-pie-chart"></i> Graficas</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-users"></i> Empleados</span></a>
                            <ul>
                                <li><a href="#"><span><i class="fa fa-plus-circle"></i> Registrar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-car"></i> Vehiculos</span></a>
                            <ul>
                                <li><a name="frmCrear" href="vehiculos.Controller.php"><span><i class="fa fa-plus-circle"></i> Registrar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-male"></i> Aprovicionadores</span></a>
                            <ul>
                                <li><a name="frmCrear" href="aprovicionadores.Controller.php"><span><i class="fa fa-plus-circle"></i> Registrar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-map-marker"></i> Destinos</span></a>
                            <ul>
                                <li><a name="frmCrear" href="destinos.Controller.php"><span><i class="fa fa-plus-circle"></i> Registrar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fa fa-user"></i> Usuarios</span></a>
                            <ul>
                                <li><a href="#"><span><i class="fa fa-plus-circle"></i> Registrar</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>         
            </div>
        </article>
    </section>
    <div class="content">
        
        <div class="contenido"></div>

    </div>
</body>
</html>

