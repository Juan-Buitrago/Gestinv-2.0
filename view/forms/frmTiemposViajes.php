<h1>Registrar Viaje</h1><hr/>
<form name='saveViaje' action ="tiempos.Controller.php" method="POST">
    <table style="text-align:left">
        <tr><td><strong>Numero de viaje:</strong></td></tr>
        <tr><td><strong>Fecha:</strong></td>
            <td><input type="date" name="fecha"></td>
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
            <td>Despachador:</td>
            <td><select name="despachador" required><option disabled selected>Seleccione...</option>
                    <?php
                    foreach ($empleados as $row):
                        echo "<option value='" . $row['pk_emp_id']."'>";
                        echo $row['emp_primer_nombre']." ". $row['emp_segundo_nombre']." ".$row['emp_primer_apellido'];
                        echo "</option>";
                    endforeach;
                    ?>
                </select></td>
        </tr>  
        <tr><td><strong>Turno:</strong></td>
            <td><select name ="turno"><option value="Manana">Mañana</option>
                    <option value ="Tarde">Tarde</option>
                    <option value ="Noche">Noche</option>
                </select></td>
        </tr>             
        <tr>                       
            <td><button onclick="processForms()">Guardar</button></td>
        </tr>
    </table>    
</form>

