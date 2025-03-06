<div class="nc-d-flex nc-justify-content-between">
                <h1 class="nc-h1"> <i class="bi bi-border-width"></i> Registro de formularios </h1>
                 
</div>

<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <div class="nc-row">
        <form class="nc-col-3" action="<?php echo _link('action=search') ?>" method="get">
            <input  class="nc-form-control" type="search" name="search_code" placeholder="Buscar por codigo exacto" value="<?php echo $_REQUEST["search_code"] ?? '' ?>">
            <input type="hidden" name="page" value="<?php echo $_REQUEST["page"] ?>" />
        </form>
    </div>
    <table class="nc-table nc-w-100 nc-my-2">
        <thead>
                <th class="nc-text-center" width="10%">CODIGO</th>
                <th  align="left" width="30%">REMITENTE</th>
                <th  align="left" width="30%">TELÉFONO</th>
                <th  align="left" width="30%">EMAIL</th>
                <th align="right">Acciones</th>
        </thead>  
        <tbody>
            <?php 
                global $nc_tbl;
                $addWhere = '';
                if (isset($_REQUEST["search_code"]) && $_REQUEST["search_code"]){
                        $addWhere =  "AND ID ='".$_REQUEST['search_code']."'";
                }

                $sql  = "SELECT * FROM `{$nc_tbl['09']}`";
               
                $listForm = wp_tbl_select($sql);
                foreach($listForm as $form){ ?>
                    <tr>
                        <td class="nc-p-1 nc-text-center"><b><?php echo $form->ID; ?></b></td>
                        <td class="nc-p-1"><?php echo $form->Remitente; ?></td>
                        <td class="nc-p-1"><?php echo $form->Telefono; ?></td>
                        <td class="nc-p-1"><?php echo $form->email; ?></td>
                        <td class="nc-p-1"><?php echo $form->Fecha_envio_cliente; ?></td>
                        <td class="nc-p-1">
                            <div class="nc-d-flex nc-gap-3 nc-justify-content-end">
                                <a class="confirm-event btn-a-icon" href="<?php echo _link('action=delete&id='.$form->recordid) ?>" title="Eliminar" ><i class="nc-text-red bi bi-trash"></i></a> | 
                                <a class="btn-a-icon" href="<?php echo _link('action=edit&id='.$form->recordid) ?>" title="Editar" ><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
