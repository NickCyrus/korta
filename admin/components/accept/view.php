<?php
    if (isset($json)){
            $json =  json_decode($json);
    }
?>
<div class="korta-group">
        <label>
            <input type="checkbox" required name="fld_<?php echo $id ?>" value="accepted" /> <?php echo $json->label ?> <?php if ($json->linktext) echo "<a href=\"{$json->link}\" target=\"_blank\">{$json->linktext}</a>" ?>
        <label>
</div>