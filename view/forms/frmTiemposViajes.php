<h1>Registrar Viaje</h1><hr/>
<form name='saveViaje' action ="tiempos.Controller.php" method="POST">
    <table>
        <tr><td><strong>Numero de viaje:</strong></td></tr>
        <tr><td><strong>Fecha:</strong></td>
            <td><input type="date" name="fecha"></td>
        </tr>
        <tr><td><strong>Placa:</strong></td>
            <td><select name ="placa"><option value="STO-611">STO-611</option>
                    <option value ="KUL-510">KUL-510</option>
                </select></td>
        </tr>
        <tr><td><strong>Despachador:</strong></td>
            <td><select name ="despachador"><option value="Luis Alberto Buitrago">Luis Alberto Buitrago</option>
                    <option value="Juan Carlos Sanchez">Juan Carlos Sanchez</option>
                </select></td>
        </tr>
        <tr><td><strong>Turno:</strong></td>
            <td><select name ="turno"><option value="Manana">Mañana</option>
                    <option value ="Tarde">Tarde</option>
                    <option value ="Noche">Noche</option>
                </select></td>
        </tr>             
        <tr>                       
            <td><button onclick=''>Guardar</button></td>
        </tr>
    </table>    
</form>

