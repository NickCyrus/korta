<?php
    if (isset($json)){
            $json =  json_decode($json);
    }
?>
<div class="korta-group">
        <label><?php echo $json->label ?><?php if (isset($json->required)) echo '<sup>*<sup>' ?></label>
        <div class="korta-field">
            <?php 
                if (isset($json->options)){
                        foreach($json->options as $option){ if(!$option) continue; ?>
                            <label>
                                <input data-label="<?php echo $json->label ?>" class="" 
                                    type="radio" name="fld_<?php echo $id ?>" value="<?php echo $option ?>" <?php if (isset($json->required)) echo 'required' ?> /> <?php echo $option ?>
                            </label>
                        <?php }                     
                }
            ?> 
        </div>
</div>