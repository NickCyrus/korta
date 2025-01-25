<?php include(PATH_PLUGIN_ADMIN.'/actions/actions-form-request.php') ?>
<div class="wrap">
   <div class="nc-mt-4" >
        <?php 
            switch(@$_REQUEST["action"]){
                default:
                case 'delete':
                    get_template_admin('pages/request/list.php' , $_REQUEST);
                break;
                case 'edit':
                    get_template_admin('pages/request/edit.php' , $_REQUEST);
                break;
               
            }
              
            ?>
   </div>
</div>
<script>
   <?php 
    if (isset($successMsg) && $successMsg) echo 'alert("'.$successMsg.'")';
   ?> 
</script>