<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link href="../view/css/impresion.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="../view/img/favicon.ico">
        <title>Impresion</title>
    </head>
    <body>
        <p> Carrera 32 N°.103 A - 19 La Enea - PBX (6) 8747979 - Manizales - Caldas </p>
        <div id ="cabecera">
            <img src="../view/img/logo.png" width="320px" height="150px" align="left"> </img> <br>&nbsp <br>&nbsp     
        </div>

        <section id="datosTransporte">

            <article id ="origenDestino">      
                <table>
                    <tr>
                        <td><strong>TIPO DE MOVIMIENTO: </strong></td>
                        <td>REMISION MANUAL</td> 
                    </tr>
                    <tr>
                        <td><strong>ORDEN DE DESPACHO: </strong></td>
                        <td><?php echo $printHeader["header"]["pk_rem_id"]; ?></td> 
                    </tr>
                    <tr>
                        <td><strong>FECHA: </strong><?php echo $printHeader["header"]["rem_fecha"]; ?></td>
                    </tr>
                    <tr>
                        <td><strong>PLACA: </strong><?php echo $printHeader["header"]["fk_pla_id"]; ?></td>
                    </tr>
                    <tr>
                        <td><strong>ID SAK: </strong><?php echo $printHeader["header"]["rem_id_sak"]; ?></td>
                    </tr>
                </table>
            </article>     
        </section>

        <section id ="datosItem">
            <article>
                <div id="referencia">      
                    <table style="width: 100%">
                        <tr>
                            <th>CODIGO</th>
                        </tr>
                        <?php
                        foreach ($printArticle as $rows):
                            echo "<tr><td>" . @$rows['rem_art_codigo'] . "</td></tr>";
                        endforeach;
                        ?>
                    </table>
                </div>    

                <div id="descripcion">
                    <table style="width: 100%">
                        <tr>
                            <th>DESCRIPCION</th>
                        </tr> 
                        <?php
                        foreach ($printArticle as $rows):
                            echo "<tr><td>" . @$rows['rem_art_descripcion'] . "</td></tr>";
                        endforeach;
                        ?>      
                    </table>  
                </div> 
                <div id="cantidad">
                    <table style="width: 100%">
                        <tr>
                            <th>CANTIDAD</th>
                            <?php
                            foreach ($printArticle as $rows):
                                @$sumatoria = ($sumatoria + $rows['rem_art_cantidad']);
                                echo "<tr><td>" . @$rows['rem_art_cantidad'] . "</td></tr>";
                            endforeach;
                            ?>      
                        </tr>                                    
                    </table>
                </div> 
                <br>
                <div id ="totales">
                    <table style="text-align:left">
                        <tr>
                            <td >&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td >&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td >&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td >&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td>&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td>&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>
                            <td>&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>                          
                            <td><strong>TOTAL CANTIDAD:&nbsp &nbsp &nbsp &nbsp  <?php echo @$sumatoria ?></strong></td>
                        </tr>
                    </table>
                </div>

                <div id ="observacion">
                    <table style="width: 673px">
                        <tr><th>OBSERVACION</th></tr>                       
                        <tr><td height="107" colspan="6"><?php echo $printHeader["header"]["rem_observacion"]; ?></td></tr>
                    </table>
                </div>

                <div id ="sellos">  
                    <br><br><br><br><br><br><br><br><br>
                    <h3>_______________&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        _______________ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        _______________</h3>
                    <h3>CONDUCTOR&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        COOTRANSNORCALDAS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        CLIENTE</h3>
                </div>
            </article>
        </section>
    </body>
</html>



