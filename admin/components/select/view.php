<?php
    if (isset($json)){
            $json =  json_decode($json);
    }
?>
<div class="korta-group">
        <label><?php echo $json->label ?><?php if (isset($json->required)) echo '<sup>*<sup>' ?></label>
        <div class="korta-field">
            <select name="fld_<?php echo $id ?>" <?php if (isset($json->required)) echo 'required' ?>>
                    <option selected value></option>
            <?php 
                if (isset($json->options)){
                        foreach($json->options as $option){ if(!$option) continue; ?>
                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                        <?php }                     
                }
            ?> 
            </select>
        </div>
</div>