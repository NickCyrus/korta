<div class="box-tax-car-res <?php echo $class ?>">
   
        <?php 
          $img = get_field('img-cat-rest', "term_{$term_id}");
          if ($img){
        ?>
            <img class="" src="<?php echo $img['url']?>" />
        <?php } ?>
        <input type="hidden" name="order_tax[]" value="<?php echo $term_id ?>" />
        <div class="title"><?php echo $name ?></div>
    
</div>