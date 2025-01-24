<?php

    if (isset($form)){
        $json =  json_decode($form->json);
    }
?>
<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <form action="<?php echo _link('save')?>" method="post" class="nc-form">
     <input type="hidden" id="page" name="page" value="<?php echo $_REQUEST["page"]?>">
     <input type="hidden" id="id" name="id" value="<?php echo $form->id ?? '' ?>">
     <div class="nc-row nc-p-3">   
            <div class="box-form nc-col-10">
                    <div class="nc-mb-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">Nombre del formulario</label>
                        <input type="text" class="nc-form-control" id="title" value="<?php echo $form->name ?? '' ?>" name="title" required>
                    </div>
                    <div class="nc-mb-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">Correo de notificación (<i>Administrador</i>)</label>
                        <input type="email" class="nc-form-control" id="notification_mail" value="<?php echo $form->notification_mail ?? '' ?>" name="notification_mail" required>
                    </div>
                    <fieldset>
                        <legend>Elementos del formulario</legend>
                        <div class="nc-border" id="form-element-korta">
                            <ul id="form-element-korta-ul" class="nc-m-0 nc-p-0">
                                <?php if (isset($form)){
                                        $components = get_korta_form_fields($form->id);
                                        if ($components){
                                                foreach($components as $component){
                                                        pre($component);
                                                }
                                        }
                                      }
                                ?>
                            </ul>
                        </div>        
                    </fieldset>
                    <div class="nc-my-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">Mensaje de respuesta enviado con éxito</label>
                        <textarea class="nc-form-control" name="msg_register_success" id="msg_register_success" rows="7" required><?php echo $json->msg_register_success ?? '' ?></textarea>
                    </div>
                    <div class="nc-my-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">TAGS</label>
                        <code class="nc-code">[number-request]</code>
                    </div>
                    <div class="nc-my-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">Email automático recepción del formulario (<i>Cliente</i>)</label>
                        <textarea class="nc-form-control" name="notification_receipt" id="editor_korta"><?php echo $form->notification_receipt ?? '' ?></textarea>
                    </div>
                    
                    
            </div>
            
            <div class="box-actions nc-col nc-p-3"> 
                <button type="submit" name="EventSaveForm" id="btnEventSave" class="nc-btn nc-btn-primary nc-w-100 nc-my-2">
                    <i class="bi bi-floppy nc-mr-1"></i> Guardar</button>
                <div>
                    <?php get_template_admin('components/list.php'); ?>
                </div>
            </div>
     </div>
    </form>

</div>
     
<script>
    jQuery(document).ready(function($) {
       // wp.editor.initialize($('#editor_korta'), true);
      // var editor = wp.editor.initialize(, cm_settings);

      wp.editor.initialize('editor_korta', {
            tinymce: {
            wpautop: true,
                plugins : 'charmap colorpicker hr lists paste tabfocus textcolor fullscreen wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern',
                toolbar1: 'bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,wp_adv,listbuttons',
                toolbar2: 'styleselect,strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help',
                textarea_rows : 20
            },
            quicktags: {buttons: 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close'},
            mediaButtons: true,
        });

    })
</script>