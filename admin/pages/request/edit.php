<?php 
    global $nc_tbl;
    wp_tbl_update($id, $nc_tbl['formrecord'],['is_new'=>0,'open_at'=>date('Y-m-d')]);
    $form      = get_korta_form_record($id);
    $record    = wp_tbl_by_id($form->recordid , $form->table_name);
    $formField = get_korta_form_fields($form->formid); 
    

    $record  = (array)$record;

    if ($formField){
        foreach($formField as $field_mail){
            if ($field_mail->type == 'email'){
                if (isset($record["fld_{$field_mail->id}"]) && $record["fld_{$field_mail->id}"]){
                    $to[] = $record["fld_{$field_mail->id}"];    
                }
            }
            $info  = json_decode($field_mail->json);
        
            if (!in_array($field_mail->type, ['accept'])){
                $lablesByKey["fld_{$field_mail->id}"] = $info->label;
            }
        }

    }
 
                // pre($form);
                // pre($recors);
                // pre($formField);
                // pre($lablesByKey);
                
?>
<style>
    .nc-table td{
        vertical-align: middle;
    }
    
</style>
<div class="nc-d-flex nc-justify-content-between">
    <h1 class="nc-h1"> <i class="bi bi-border-width"></i> Registro de formularios /  Registro</h1>
    <a href="javascript::void(0)" onclick="history.back()"  style="text-decoration: none;"> <i class="bi bi-arrow-90deg-left"></i> Regresar </a>
</div>

<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <div class="nc-row nc-p-3">   
        <div class="box-form nc-col-6">
           
                <table class="nc-table">
                            <tbody>
                                    <thead>
                                        <tr><th colspan="2">Formulario del cliente - <b><?php echo $form->code ?></b></th></tr>
                                    </thead>
                                    <?php foreach($lablesByKey as $key=>$cap){
                                            $value = getValueForm($record["{$key}"]);
                                            echo "<tr>
                                                    <td class='cap'>{$cap}</td>
                                                    <td class='value'>{$value}</td>
                                                  </tr>";
                                    }
                                    ?>
                                
                            </tbody>
                    </table>
                </div>
        <div class="box-actions nc-col  nc-pt-0 nc-px-3 nc-pb-3">
                <form action="<?php echo _link('save')?>" method="post" class="nc-form-response">
                    <input type="hidden" id="page" name="page" value="<?php echo $_REQUEST["page"]?>">
                    <input type="hidden" id="id" name="id" value="<?php echo $form->recordid ?? '' ?>">
                    <input type="hidden" id="formid" name="formid" value="<?php echo $form->formid ?? '' ?>">
                    <input type="hidden" id="recordid" name="recordid" value="<?php echo $form->recordid ?? '' ?>">
                    <input type="hidden" id="code" name="code" value="<?php echo $form->code ?? '' ?>">
                    <?php 
                        foreach($to as $email){
                            echo '<input type="hidden" name="to[]" value="'.$email.'">';
                        } 
                    ?>
                    <h3 class="nc-mt-0">Respuesta a cliente</h3>
                    <textarea  rows="18" id="editor_korta" name="response"></textarea>
                    <button class=" nc-my-3 nc-btn nc-btn-primary nc-w-100" name="kotan-send-response"><i class="bi bi-envelope-at-fill"></i> Enviar</button>
                </form>

        </div>
</div>
<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <div class="nc-row nc-p-3"> 
        <h1>Respuestas enviadas</h1>
        <table class="nc-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Respuesta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql      = "SELECT * FROM {$nc_tbl['formresponse']} WHERE formid='{$form->formid}' AND recordid = '{$form->recordid}' ORDER BY resposedate";
                    $comments = wp_tbl_select($sql); 
                    if ($comments){
                        foreach($comments as $comment){
                            echo "<tr>
                                    <td>".fecha_texto($comment->resposedate, "%d/%m/%Y")."</td>
                                    <td>".stripslashes($comment->response)."</td>
                                </tr>";
                        }
                    }    
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
       
      wp.editor.initialize('editor_korta', {
            tinymce: {
            wpautop: false,
                plugins : 'charmap colorpicker hr lists paste tabfocus textcolor fullscreen wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern',
                toolbar1: 'bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,wp_adv,listbuttons',
                toolbar2: 'styleselect,strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help',
                textarea_rows : 40
            },
            quicktags: {buttons: 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close'},
            mediaButtons: true,
        });

        $('#form-element-korta #form-element-korta-ul').sortable();

    })
</script>