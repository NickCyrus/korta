<?php
    if (isset($json)){
            $json =  json_decode($json);
    }
?>
<div class="korta-group">
        <label><?php echo $json->label ?><?php if (isset($json->required)) echo '<sup>*<sup>' ?></label>
        <div class="korta-field">
            <textarea name="fld_<?php echo $id ?>" id="fld_<?php echo $id ?>"  <?php if (isset($json->required)) echo 'required' ?>></textarea>
        </div>
</div>