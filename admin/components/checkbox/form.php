<?php
    if (isset($json)){
        $json =  json_decode($json);
    }
?>
<div class="nc-cards cards-toggle">
    <div class="nc-card-header">
        <div class="nc-row">
            <div class="nc-col-auto nc-align-items-center nc-d-flex"><i class="bi bi-ui-checks nc-mr-3"></i> <?php echo "<code>$shortcode</code>"  ?? '' ?></div>
            <div class="nc-col  nc-align-items-center nc-d-flex"><span class="caption-name w-100"><?php echo $json->label ?? '' ?></span></div>
            <div class="nc-col-1 nc-text-right"><i class="bi bi-trash3 flex-shrink-1" onclick="deleteParent<?php echo $uniqId ?>(this)"></i></div>
        </div>
    </div>
    <div class="nc-card-body nc-border nc-hide">

            <input type="hidden" name="kortaField[field][<?php echo $uniqId ?>][id]" value="<?php echo $id ?? '' ?>" />               
            <input type="hidden" name="kortaField[field][<?php echo $uniqId ?>][type]" value="<?php echo $TypeElement ?? $type?>" />

            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Etiqueta *</label>
                <div class="nc-col">
                <input type="text" class="nc-form-control write-title" name="kortaField[field][<?php echo $uniqId ?>][label]" value="<?php echo $json->label ?? '' ?>" required >
                </div>
            </div>
            <div class="nc-mb-2 nc-row">
                <label for="inputPassword" class="nc-col-sm-2 nc-col-form-label">Opciones</label>
                <div class="nc-col">
                    <ul class="nc-m-0 nc-p-0">
                        <button type="button" class="nc-btn-sm nc-btn-primary nc-mb-1" onclick="add<?php echo $uniqId ?>(this)"> <i class="bi bi-plus-lg nc-mr-3"></i> Nueva opción </button>
                        <?php
                            
                        if ($json->options){ 
                                    foreach($json->options as $option){ 
                                            if (!$option) continue;
                        ?>
                                        <li style="list-style:none;" class="nc-m-0 nc-pb-0">
                                            <div class="nc-d-flex nc-align-items-center">
                                                    <input value="<?php echo $option ?>" type="text" class="nc-form-control" placeholder="Opcion" name="kortaField[field][<?php echo $uniqId ?>][options][]">
                                                    <span class="input-group-text nc-text-red nc-pointer nc-p-3" onclick="deleteElement<?php echo $uniqId ?>(this)">
                                                        <i class="bi bi-trash3"></i>
                                                    </span>
                                            </div>
                                        </li>
                            <?php }
                                }else{ ?>
                                    <li style="list-style:none;" class="nc-m-0 nc-pb-0">
                                        <div class="nc-d-flex nc-align-items-center">
                                                <input type="text" class="nc-form-control" placeholder="Opcion" name="kortaField[field][<?php echo $uniqId ?>][options][]">
                                                <span class="input-group-text nc-text-red nc-pointer nc-p-3" onclick="deleteElement<?php echo $uniqId ?>(this)">
                                                    <i class="bi bi-trash3"></i>
                                                </span>
                                        </div>
                                    </li>
                            <?php } ?>
                            <div class="clone nc-hide">
                                <li style="list-style:none;" class="nc-m-0 nc-pb-0">
                                    <div class="nc-d-flex nc-align-items-center">
                                            <input type="text" class="nc-form-control" placeholder="Opcion" name="kortaField[field][<?php echo $uniqId ?>][options][]">
                                            <span class="input-group-text nc-text-red nc-pointer nc-p-3" onclick="deleteElement<?php echo $uniqId ?>(this)">
                                                <i class="bi bi-trash3"></i>
                                            </span>
                                    </div>
                                </li>
                            </div>
                    </ul>
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
    function add<?php echo $uniqId ?>(obj){
        var ul_parent = $(obj).parent()
        ul_parent.append(ul_parent.find('.clone').html())
        ul_parent.sortable();
    }

    function deleteElement<?php echo $uniqId ?>(obj){
        if (confirm('¿Desea eliminar esta opción de seleccion?')){
            $(obj).parent().parent('li').remove();
        }
    }

    function deleteParent<?php echo $uniqId ?>(obj){
        if (confirm('¿Desea eliminar este campo?')){
            $(obj).parents('.nc-cards').remove();
        }
    }
</script>