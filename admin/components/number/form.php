<?php
    if (isset($form)){
        $json =  json_decode($form->json);
    }
?>
<div class="nc-cards cards-toggle">
    <div class="nc-card-header">
        <div class="nc-row">
            <div class="nc-col-auto"><i class="bi bi-123 nc-mr-3"></i></div>
            <div class="nc-col"><span class="caption-name w-100"><?php echo $json->label ?? '' ?></span></div>
            <div class="nc-col-1 nc-text-right"><i class="bi bi-trash3 flex-shrink-1" onclick="deleteParent<?php echo $uniqId ?>(this)"></i></div>
        </div>
    </div>
    <div class="nc-card-body nc-border nc-hide">
            
            <input type="hidden" name="kortaField[field][<?php echo $uniqId ?>][id]" value="<?php echo $id ?? '' ?>" />               
            <input type="hidden" name="kortaField[field][<?php echo $uniqId ?>][type]" value="<?php echo $type ?? $TypeElement?>" />

            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Etiqueta *</label>
                <div class="nc-col">
                    <input type="text" class="nc-form-control write-title" name="kortaField[field][<?php echo $uniqId ?>][label]" value="<?php echo $json->label ?? '' ?>" required >
                </div>
            </div>

            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Obligatorio </label>
                <div class="nc-col">
                <input type="checkbox" class="nc-form-control" name="kortaField[field][<?php echo $uniqId ?>][required]" <?php if (isset($json->required) && $json->required) echo 'checked' ?> value="1" >  
                </div>
            </div>
 
    </div>
</div>
<script>
    function deleteParent<?php echo $uniqId ?>(obj){
        if ('confirm(¿Desea eliminar este campo?')){
            $(obj).parents('.nc-cards').remove();
        }
    }
</script>