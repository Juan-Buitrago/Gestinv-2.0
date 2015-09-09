<div class="contenido">
    <?php
    if ($process == 0) {
        echo'
    <h1>Registrar Articulos</h1><hr/>
    <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p><br>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $save['header']['pk_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $save['header']['fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $save['header']['placa'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $save['header']['id_sak'] . '</td></tr>
    </table><br>
    <table style="text-align: left">
        <tr><td>Observacion:</td></tr>
        <tr><td>' . $save['header']['observacion'] . '</td></tr>
    </table><hr/>
    <form name="remisiones" action ="saveRemision" method ="POST">
        <table width="700">
            <tr> 
                <th><strong>CODIGO</strong></th>
                <th><strong>DESCRIPCION</strong></th>
                <th><strong>CANTIDAD</strong></th>
            </tr>
            <tr> 
                <td><input type ="text" name ="codigo" autocomplete="off" required  ></td>
                <td><input type ="text" name ="descripcion" autocomplete="off" required></td>
                <td><input type ="number" name ="cantidad" autocomplete="off" required></td>
            </tr>
        </table><hr/>
        <table>
            <tr> 
                <td><button>Añadir</button> </td>
                </form>
                <td>
                    <a href="?"><button>Finalizar</button></a>
                </td>
            </tr>
        </table>';
    } elseif ($process == 1) {

        echo'
    <h1>Registrar Articulos</h1><hr/>
    <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $save['header']['header']['pk_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $save['header']['header']['fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $save['header']['header']['placa'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $save['header']['header']['id_sak'] . '</td></tr>
    </table><br>
    <table style="text-align: left">
        <tr><td>Observacion:</td></tr>
        <tr><td>' . $save['header']['header']['observacion'] . '</td></tr>
    </table><hr/>
    <form action ="?action=remisiones&petition=saveArticulos&id=' . $save['header']['header']['pk_id'] . '" method ="POST">
        <table width="700">
            <tr> 
                <th><strong>CODIGO</strong></th>
                <th><strong>DESCRIPCION</strong></th>
                <th><strong>CANTIDAD</strong></th>
            </tr>
            <tr> 
                <td><input type ="text" name ="codigo" autocomplete="off" required  ></td>
                <td><input type ="text" name ="descripcion" autocomplete="off" required></td>
                <td><input type ="number" name ="cantidad" autocomplete="off" required></td>
            </tr>
        </table><hr/>
        <table>
            <tr> 
                <td><button>Añadir</button></td>
                </form>
                <td>
                    <form action="?action=remisiones&petition=impresion" target="_blank" method ="POST"><input type = "hidden" name ="id" value="' . @$save['header']['header']['pk_id'] . '"><button>Imprimir</button></form>
                </td>
                <td>
                    <form action="?" method ="POST"><button>Finalizar</button></form>
                </td>
            </tr>
        </table><hr/>
        <table border="1" width="700" style="text-align: center">';
        foreach ($save as $row) {
            echo "<tr>";
            echo "<td>" . @$row['codigo'] . "</td>";
            echo "<td>" . @$row['descripcion'] . "</td>";
            echo "<td>" . @$row['cantidad'] . "</td>";
            echo "</tr>";
        }
        echo'</table>';
    } elseif ($process == 2) {

        echo '
    <h1>Detalle de Remision</h1><hr/> 
    <p>¡Estos fueron los datos que encontramos mas acordes a tu busqueda!</p>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $header['header']['pk_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $header['header']['fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $header['header']['placa'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $header['header']['id_sak'] . '</td></tr>
        <tr><td>Usuario:&nbsp&nbsp' . $header['header']['usuario'] . '</td></tr>
    </table>
    <hr/>
    <table border="1" width="700" class="resultados">
        <tr>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>CANTIDAD</td>
        </tr>';
        foreach ($article as $rows) {
            echo "<tr>
                     <td>" . @$rows['codigo'] . "</td>
                     <td>" . @$rows['descripcion'] . "</td>
                     <td>" . @$rows['cantidad'] . "</td>
          </tr>";
        }
        echo'
    </table>
    <table>
        <tr>
            <td>
                <form action="?action=remisiones&petition=impresion" target="_blank" method ="POST"><input type = "hidden" name ="id" value="' . @$header['header']['pk_id'] . '"><button>Imprimir</button></form>
            </td>
        </tr>
    </table>';
    } elseif ($process == 3) {
        echo'   
     <h1>Resultados</h1><hr/>
    <p>¡Estos fueron los datos que encontramos mas acordes a tu busqueda!</p>
        <table border="1" style="text-align: center;" width="700">
            <tr>
                <td>Detalle</td>
                <td>ID</td>
                <td>Placa</td>
                <td>Fecha</td>
            </tr>';

        foreach ($consult as $row):
            echo "<tr>";
            echo "<td><form action='?action=remisiones&petition=consult' method='post' target='_blank'><input name ='img' type='image'  src='view/img/ok.png'/ style='border:0;background:none;'><input type = 'hidden' name ='id' value='" . $row ['pk_id'] . "'></form></td>";
            echo "<td>" . @$row['pk_id'] . "</td>";
            echo "<td>" . @$row['placa'] . "</td>";
            echo "<td>" . @$row['fecha'] . "</td>";
            echo"</tr>";
        endforeach;
        echo'</table> 
    <table>
        <tr>
            <td><a href="?action=remisiones&petition=frmConsulta"><button>Atras</button></a></td>
        </tr>
    </table>';
    }elseif ($process == 4) {
        echo'    
         <h1>Editar Remision</h1><hr/>
         <p>¡¡Recuerda ingresar todos los datos solicitados antes de guardar!!</p>
    <table style="text-align: left">
        <form action ="?action=remisiones&petition=actualizar" method="POST">
            <tr>
                <td>Id:</td><td>' . $header['header']['pk_id'] . '<input type = "hidden" name ="id" value="' . $header['header']['pk_id'] . '"></td>
            </tr>
            <tr>
                <td>Fecha:</td>
                <td>' . $header['header']['fecha'] . '</td>
            </tr>
            <tr>
                <td>Placa:</td>
                <td><input type ="text" name="placa" value="' . $header['header']['placa'] . '" required></td>
            </tr>  
            <tr>
                <td>Id Sak:</td>
                <td><input type ="text" name="id_sak" value="' . $header['header']['id_sak'] . '"required></td>                                    
            </tr>
            <tr>    
                <td>Observacion:</td> 
                <td><input type="text" name="observacion" value ="' . $header["header"]["observacion"] . '" size="60"></td>       
            </tr>
            <tr>
                <td><button>Actualizar</button></td>
            </tr>
        </form>
    </table>
    <hr/>
    <table border="1" width="700" class="resultados">
        <tr>
            <td>Edit</td>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>CANTIDAD</td>
        </tr>';

        foreach ($article as $rows):
            echo '<tr>
                     <td><form action="?action=remisiones&petition=edit" method="post"><input name ="img" type="image"  src="view/img/edit.png" style="border:0;background:none;"/><input type = "hidden" name ="id_article" value="' . @$rows['pk_id'] . '"></form></td>
                     <td>' . @$rows['codigo'] . '</td>
                     <td>' . @$rows['descripcion'] . '</td>
                     <td>' . @$rows['cantidad'] . '</td>
                  </tr>';
        endforeach;
        echo'</table>';
    }elseif ($process == 5) {
        echo'    
        <h1>Editar Articulo</h1><hr/> 
        <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p>
    <table border="1" width="700" class="resultados">
        <tr>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>CANTIDAD</td>
        </tr>';

        foreach ($article as $rows):
            echo "<tr>
                    <form action='?action=remisiones&petition=actualizar' method='post'><input type = 'hidden' name ='id_article' value='" . @$rows['pk_id'] . "'></td>
                    <td><input type ='text' name ='codigo' autocomplete='off' required value='" . @$rows['codigo'] . "' ></td>
                    <td><input type ='text' name ='descripcion' autocomplete='off' value='" . @$rows['descripcion'] . "' required></td>
                    <td><input type ='number' name ='cantidad' autocomplete='off' value ='" . @$rows['cantidad'] . "' required></td>
                  </tr>";
        endforeach;
        echo'
    </table>
    <table>
        <tr><td><button>Actualizar</button></td></tr>
    </table>
    </form>';
    }else if ($process == 6) {

        if ($update == 0) {
            echo "<h1>Fallo La Actualizacion</h1>";
        } elseif ($update == 1) {
            echo "<h1>Actualizacion Exitosa</h1>";
        }
    }
    else if($process == 7){
         if ($delete == 0) {
            echo "<h1>Fallo La Eliminacion</h1>";
        } elseif ($delete == 1) {
            echo "<h1>La Remision Se Elimino Correctamente</h1>";
        }
        
    }
    ?>
</div>




