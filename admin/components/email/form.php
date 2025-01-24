<div class="nc-cards cards-toggle">
    <div class="nc-card-header">
        <div class="nc-row">
            <div class="nc-col-auto"><i class="bi bi-at nc-mr-3"></i></div>
            <div class="nc-col"><span class="caption-name w-100"></span></div>
            <div class="nc-col-1 nc-text-right"><i class="bi bi-trash3 flex-shrink-1" onclick="deleteParent<?php echo $uniqId ?>(this)"></i></div>
        </div>
    </div>
    <div class="nc-card-body nc-border nc-hide has-input-email">

            <input type="hidden" name="kortaField['field'][<?php echo $uniqId ?>]['id']" value="" />               
            <input type="hidden" name="kortaField['field'][<?php echo $uniqId ?>]['type']" value="<?php echo $TypeElement?>" />

            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Etiqueta *</label>
                <div class="nc-col">
                    <input type="text" class="nc-form-control write-title" name="kortaField['field'][<?php echo $uniqId ?>]['label']" value="" required >
                </div>
            </div>
            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Placeholder</label>
                <div class="nc-col">
                    <input type="text"  class="nc-form-control" name="kortaField['field'][<?php echo $uniqId ?>]['placeholder']" value="" >
                </div>
            </div>
            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Obligatorio </label>
                <div class="nc-col">
                    <input type="checkbox" class="nc-form-control write-title" 
                    name="kortaField['field'][<?php echo $uniqId ?>]['required']" value="" > 
                </div>
            </div>
    </div>
</div>
<script>
    function deleteParent<?php echo $uniqId ?>(obj){
        if (confirm('¿Desea eliminar este campo?')){
            $(obj).parents('.nc-cards').remove();
        }
    }
</script>