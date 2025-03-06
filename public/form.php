<style>
    .elements-form{
         
    }

    .elements-form .line{
        display: flex;
        gap: 20px;
    }

    .element-form{
        display: flex;
        margin-bottom: 5px;
        align-items: flex-start;
        flex: 1;
        flex-direction: column;
    }
 

    .element-form input{
        width: 100%;
        max-height: 40px;
    }

    .element-form input[type="number"]{
        width: 150px;
    }

    .element-form input[type="date"]{
        width: 150px;
    }
    .table-slim {
        position: relative;
    }
    
    .table-slim .eventClose {
        position: absolute;
        right: 12px;
        top: -15px;
        border-radius: 40%;
        background: #ff5151;
        padding: 4px 14px;
        cursor: pointer;
        color: #FFF;
        font-weight: 400;
    }

    .table-slim td{
            padding: 3px;
            margin: 0px;
    }

    #table-husillo{ display: none;}
    #box-husillo-container table{
        margin: 10px 0px;
        padding: 10px;
        background: #fafafa;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    #box-husillo-container table:first-child{
        border-top : none;
    }
</style>
<div class="elements-form">
    <div class="line">
        <div class="element-form">
                <label>Remitente</label>
                <input name="Remitente" value="" required />
        </div>
        <div class="element-form">
                <label>Persona de contacto</label>
                <input name="Persona_de_contacto" value="" required />
        </div>
    </div>
    <div class="line">
        <div class="element-form">
                <label>Vuestra referencia</label>
                <input name="Referencia_cliente" value="" required />
        </div>

        <div class="element-form">
                <label>Teléfono</label>
                <input name="Telefono" value="" required />
        </div>
    </div>

    <div class="line">
        <div class="element-form">
                <label>Nº de husillos enviados</label>
                <input type="number" min="1" class="N_de_husillos_enviados" name="N_de_husillos_enviados" value="" required />
        </div>

        <div class="element-form">
                <label>Email</label>
                <input type="email" name="email" value="" required />
        </div>
    </div>
    <div class="line">
        <div class="element-form">
                <label>Fecha de envio</label>
                <input type="date" name="Fecha_envio_cliente" value="" required />
        </div>

        <div class="element-form"></div>
    </div>
    <div class="line">
        <div class="element-form">
                <label>Observaciones</label>
                <textarea name="Observaciones"></textarea>
        </div>
    </div>
</div>
<div class="" id="box-husillo-container"></div>
