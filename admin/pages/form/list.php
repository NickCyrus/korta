<div class="nc-d-flex nc-justify-content-between">
                <h1 class="nc-h1"> <i class="bi bi-calendar3-range"></i> Formularios </h1>
                <a href="<?php echo _link('action=new') ?>" class="nc-btn nc-btn-primary">Nuevo formulario</a>
</div>

<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <table class="nc-table nc-w-100 nc-my-2">
        <thead>
                <th align="left" width="10%">Shortcode</th>
                <th  align="left" width="30%">Nombre</th>
                <th  align="left" width="30%">Notificar a</th>
                <th >Registros</th>
                <th align="right">Acciones</th>
        </thead>  
        <tbody>
            <?php 
                global $wpdb;
                global $nc_tbl;
                $listForm = wp_tbl_select("SELECT * FROM `{$nc_tbl['form']}` WHERE is_deleted = 0 ORDER BY id DESC ");
                foreach($listForm as $form){ ?>
                    <tr>
                        <td class="nc-p-1"><code>[kortaform id=<?php echo $form->id; ?>]</td>
                        <td class="nc-p-1"><?php echo $form->name; ?></td>
                        <td class="nc-p-1"><?php echo $form->notification_mail?></td>
                        <td align="center" class="nc-p-1">0</td>
                        <td class="nc-p-1">
                            <div class="nc-d-flex nc-gap-3 nc-justify-content-end">
                                <a class="confirm-event btn-a-icon" href="<?php echo _link('action=delete&id='.$form->id) ?>" title="Eliminar" ><i class="nc-text-red bi bi-trash"></i></a> | 
                                <a class="btn-a-icon" href="<?php echo _link('action=edit&id='.$form->id) ?>" title="Editar" ><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
