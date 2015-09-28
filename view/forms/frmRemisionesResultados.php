<?php
if ($process == 0) {
    echo'
    <h1>Registrar Articulos</h1><hr/>
    <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p><br>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $save['header']['pk_rem_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $save['header']['rem_fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $save['header']['fk_pla_id'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $save['header']['rem_id_sak'] . '</td></tr>
    </table><br>
    <table style="text-align: left">
        <tr><td>Observacion:</td></tr>
        <tr><td>' . $save['header']['rem_observacion'] . '</td></tr>
    </table><hr/>
    <form name="saveArticulos" action ="remisiones.Controller.php" method ="POST">
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
                <td><input type ="hidden" name ="id" value="' . $save['header']['pk_rem_id'] . '"></td>
            </tr>
        </table><hr/>
        <table>
            <tr> 
                <td><button onclick="processForms()">Añadir</button> </td>
                </form>
            </tr>
        </table>';
} elseif ($process == 1) {

    echo'
    <h1>Registrar Articulos</h1><hr/>
    <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $save['header']['header']['pk_rem_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $save['header']['header']['rem_fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $save['header']['header']['fk_pla_id'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $save['header']['header']['rem_id_sak'] . '</td></tr>
    </table><br>
    <table style="text-align: left">
        <tr><td>Observacion:</td></tr>
        <tr><td>' . $save['header']['header']['rem_observacion'] . '</td></tr>
    </table><hr/>
    <form name="saveArticulos" action ="remisiones.controller.php" method ="POST">
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
                <td><input type ="hidden" name ="id" value="' . $save['header']['header']['pk_rem_id'] . '"></td>
            </tr>
        </table><hr/>
        <table>
            <tr> 
                <td><button onclick="processForms()">Añadir</button></td>
                </form>
                <td>
                     <form name="impresion" action ="remisiones.controller.php" method ="POST"><input type = "hidden" name ="id" value="' . @$save['header']['header']['pk_rem_id'] . '"><button onclick="processForms()">Imprimir</button></form>
                </td>    
            </tr>
        </table><hr/>
        <table border="1" width="700" style="text-align: center">';
    foreach ($save as $row) {
        echo "<tr>";
        echo "<td>" . @$row['rem_art_codigo'] . "</td>";
        echo "<td>" . @$row['rem_art_descripcion'] . "</td>";
        echo "<td>" . @$row['rem_art_cantidad'] . "</td>";
        echo "</tr>";
    }
    echo'</table>';
} elseif ($process == 2) {

    echo '
    <h1>Detalle de Remision</h1><hr/> 
    <p>¡Estos fueron los datos que encontramos mas acordes a tu busqueda!</p>
    <table style="text-align: left">
        <tr><td>Orden de Despacho:&nbsp&nbsp ' . $header['header']['pk_rem_id'] . '</td></tr>
        <tr><td>Tipo de Movimiento:&nbsp&nbsp Remision Manual</td></tr>
        <tr><td>Fecha:&nbsp&nbsp' . $header['header']['rem_fecha'] . '</td></tr>
        <tr><td>Placa:&nbsp&nbsp' . $header['header']['fk_pla_id'] . '</td></tr>  
        <tr><td>Id Sak:&nbsp&nbsp' . $header['header']['rem_id_sak'] . '</td></tr>
        <tr><td>Id Sak:&nbsp&nbsp' . $header['header']['rem_observacion'] . '</td></tr>
        <tr><td>Usuario:&nbsp&nbsp' . $header['header']['fk_usu_id'] . '</td></tr>
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
                     <td>" . @$rows['rem_art_codigo'] . "</td>
                     <td>" . @$rows['rem_art_descripcion'] . "</td>
                     <td>" . @$rows['rem_art_cantidad'] . "</td>
          </tr>";
    }
    echo'
    </table>
    <table>
        <tr>
            <td>
                <form name="impresion" action ="remisiones.controller.php" method ="POST"><input type = "hidden" name ="id" value="' . @$header['header']['pk_rem_id'] . '"><button onclick="processForms()">Imprimir</button></form>
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
        echo "<td><form name='consulta' action ='remisiones.controller.php' method ='POST'><input name ='img' type='image'  src='view/img/ok.png'/ style='border:0;background:none;' onclick='processForms()'><input type = 'hidden' name ='id' value=' ". @$row ['pk_rem_id'] ."'></form></td>";
        echo "<td>" . @$row['pk_rem_id'] . "</td>";
        echo "<td>" . @$row['fk_pla_id'] . "</td>";
        echo "<td>" . @$row['rem_fecha'] . "</td>";
        echo"</tr>";
    endforeach;
    echo'</table> 
    <table>
        <tr>
            <td> <form name="finalizar" action ="remisiones.controller.php" method ="POST"><button onclick="processForms()">Finalizar</button></form></td>
        </tr>
    </table>';
}elseif ($process == 4) {
    echo'    
         <h1>Editar Remision</h1><hr/>
         <p>¡¡Recuerda ingresar todos los datos solicitados antes de guardar!!</p>
        <form name="actualizar" action ="remisiones.controller.php" method="POST">
        <table style="text-align: left">
            <tr>
                <td>Id:</td><td>' . $header['header']['pk_rem_id'] . '<input type = "hidden" name ="id" value="' . $header['header']['pk_rem_id'] . '"></td>
            </tr>
            <tr>
                <td>Fecha:</td>
                <td>' . $header['header']['rem_fecha'] . '</td>
            </tr>
            <tr>
            <td>Placa:</td>
            <td><select name="placa" required><option value="'.$header['header']['fk_pla_id'].'">'.$header['header']['fk_pla_id'].'</option>';
                   
                    foreach ($placas as $row):
                        echo "<option value='" . $row['pk_pla_id'] . "'>";
                        echo $row['pk_pla_id'];
                        echo "</option>";
                    endforeach;
                  
         echo' </select></td>
        </tr>   
            <tr>
                <td>Id Sak:</td>
                <td><input type ="text" name="id_sak" value="' . $header['header']['rem_id_sak'] . '"required></td>                                    
            </tr>
            <tr>    
                <td>Observacion:</td> 
                <td><input type="text" name="observacion" value ="' . $header["header"]["rem_observacion"] . '" size="60"></td>       
            </tr>
            <tr>
                <td><button onclick="processForms()">Actualizar</button></td>
            </tr>    
    </table>
    </form>
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
                     <td><form name="editar" action ="remisiones.controller.php" method="POST"><input name ="img" type="image"  src="view/img/edit.png" style="border:0;background:none;" onclick="processForms()"/><input type = "hidden" name ="id_article" value="' . @$rows['pk_rem_art_id'] . '"></form></td>
                     <td>' . @$rows['rem_art_codigo'] . '</td>
                     <td>' . @$rows['rem_art_descripcion'] . '</td>
                     <td>' . @$rows['rem_art_cantidad'] . '</td>
                  </tr>';
    endforeach;
    echo'</table>';
}elseif ($process == 5) {
    echo'    
        <h1>Editar Articulo</h1><hr/> 
        <p>¡Recuerda ingresar todos los datos solicitados antes de guardar!</p>
        <form name="actualizar" action ="remisiones.controller.php" method="POST">
        
        <table border="1" width="700" class="resultados">
        <tr>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>CANTIDAD</td>
        </tr>';

    foreach ($article as $rows):
        echo "<tr>
                    <td><input type ='text' name ='codigo' autocomplete='off' value='" . @$rows['rem_art_codigo'] . "' required></td>
                    <td><input type ='text' name ='descripcion' autocomplete='off' value='" . @$rows['rem_art_descripcion'] . "' required></td>
                    <td><input type ='number' name ='cantidad' autocomplete='off' value ='" . @$rows['rem_art_cantidad'] . "' required></td>
                    <input type = 'hidden' name ='id_article' value='". @$rows['pk_rem_art_id']."'>
               </tr>";
    endforeach;
    echo'
    </table>
    <table>
        <tr><td><button onclick="processForms()">Actualizar</button></td></tr>
    </table>
    </form>';
}else if ($process == 6) {

    if ($update == 0) {
        echo "<h1>Fallo La Actualizacion</h1>";
    } elseif ($update == 1) {
        echo "<h1>Actualizacion Exitosa</h1>";
    }
} else if ($process == 7) {
    if ($delete == 0) {
        echo "<h1>Fallo La Eliminacion</h1>";
    } elseif ($delete == 1) {
        echo "<h1>La Remision Se Elimino Correctamente</h1>";
    }
}
?>