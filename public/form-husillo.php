required<div class="hide" id="table-husillo">
    <table class="table-slim">
        <tbody>
            <tr>
                <td><div class="eventClose">X</div>Vuestra referencia husillo *</td>
                <td><input name="Referencia_cliente_husillo[]" required /></td>
                <td>Urgencia *</td>
                <td> 
                    <select name="Urgencia[]" required>
                            <option value="" selected></option>
                            <option value="1">Baja</option>
                            <option value="2">Media</option>
                            <option value="3">Alta</option>
                    </select>
                   
                </td>
            </tr>  
            <tr>
                <td>Problema detectado</td>
                <td colspan="3"><textarea name="Problema_detectado[]" required></textarea></td>
            </tr> 
            <tr>
                <td>Ofertar antes de reparar *</td>
                <td>
                    <label><input checked type="radio" name="Ofertar_antes_de_reparar[]" value="1" required> SI </label>
                    <label><input type="radio" name="Ofertar_antes_de_reparar[]" value="0" required> NO </label>
                </td>
                <td>Croquizar y ofertar husillo nuevo *</td>
                <td>
                    <label><input checked type="radio" name="Croquizar_y_ofertar_husillo_nuevo[]" value="1" required> SI </label>
                    <label><input type="radio" name="Croquizar_y_ofertar_husillo_nuevo[]" value="0" required> NO </label>
                </td>
            </tr>    
            <tr>
                <td>Achatarrar husillo no reparable *</td>
                <td>
                    <label><input checked type="radio" name="Achatarrar_husillos_no_reparables[]" value="1" required> SI </label>
                    <label><input type="radio" name="Achatarrar_husillos_no_reparables[]" value="0" required> NO </label>
                </td>
                <td>Fabricante de la máquina</td>
                <td>
                    <input name="Fabricante_de_la_maquina[]" />
                </td>
            </tr>   
            <tr>
                <td>Modelo de la máquina</td>
                <td>
                    <input name="Modelo_de_maquina[]" />
                </td>
                <td></td>
                <td></td>
            </tr>          
            
            </tr>
        </tbody>
    </table>
</div>