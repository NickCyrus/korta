<?php
   $components = [
                   ['number','bi-123','Campo numérico'],
                   ['checkbox','bi-ui-checks','Opción multiple'],
                   ['radio','bi-ui-radios','Opción única'],
                   ['email','bi-at','Campo correo'],
                   ['file','bi-upload','Campo carga de archivo'],
                   ['input-text','bi-input-cursor-text','Campo de texto corto'],
                   ['textarea','bi-card-text','Campo de texto largo'],
                   ['select','bi-justify','Campo tipo selección']
                    
   ]
?>

<div class="wrap">
   <div class="nc-container" >
      <!-- <img src="<?php echo PATH_PLUGIN_URL.'korta-logo.svg' ?>" width="80%" /> !-->
      <div class="nc-border nc-p-2 nc-bg-white" >
              
            <div class="nc-d-flex nc-flex-column nc-gap-2 nc-flex-wrap">
               <?php foreach($components as $component) { ?>
               <div data-type="<?php echo $component[0] ?>" class="nc-p-3 nc-flex-fill nc-rounded nc-border component-item nc-d-flex nc-gap-2 nc-align-items-center">
                     <i class="bi <?php echo $component[1] ?>"></i> <?php echo $component[2] ?>
               </div>
               <?php } ?>
               
            </div>
      </div> 
   </div>
</div>
