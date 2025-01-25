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
                                <input 
                                     data-label="<?php echo $json->label ?>"
                                     data-control=".fld_<?php echo $id ?>"
                                     class="fld_<?php echo $id ?> <?php if (isset($json->required)) echo 'required-ckeck' ?>" 
                                    type="checkbox" name="fld_<?php echo $id ?>[]" value="<?php echo $option ?>" /> <?php echo $option ?>
                            </label>
                        <?php }                     
                }
            ?> 
        </div>
</div>