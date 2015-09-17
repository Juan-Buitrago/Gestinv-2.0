<script type="application/javascript" language="javascript" src="/Gestinv-2.0/view/js/jquery.js"></script>
<script type="application/javascript" language="javascript" src="/Gestinv-2.0/view/js/ajax.js"></script>
<h1>Registrar Remision</h1><hr/>
<form name="saveRemision" action ="remisiones.controller.php" method="POST" autocomplete="off">
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
            <td><select name="placa" required><option disabled selected>Seleccione...</option>
                    <?php
                    foreach ($placas as $row):
                        echo "<option value='" . $row['pk_pla_id'] . "'>";
                        echo $row['pk_pla_id'];
                        echo "</option>";
                    endforeach;
                    ?>
                </select></td>
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