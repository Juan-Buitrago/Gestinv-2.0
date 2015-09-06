<div class="contenido">
    <h1>Registrar Remision</h1><hr/>
    <form action ="?action=remisiones&petition=saveRemision" method="POST">
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
                <td><input type ="text" name="placa" autocomplete="off" required></td>
            </tr>  
            <tr>
                <td>Id Sak:</td>
                <td><input type ="text" name="id_sak" autocomplete="off" required></td>                                    
            </tr>
            <tr>    
                <td>Observacion:</td>

            </tr>
        </table>
        <table>
            <tr>
                <td><textarea rows="4" cols="50" name="observacion" autocomplete="off" required></textarea></td>
            </tr>
        </table>

        <table>
            <tr>
                <td><button>Guardar</button></td>
            </tr>
        </table>
    </form>
</div>