<?php include(PATH_PLUGIN_ADMIN.'/actions/actions-form.php') ?>
<div class="wrap">
   <div class="nc-mt-4" >
        <?php 
            switch(@$_REQUEST["action"]){
                default:
                    get_template_admin('pages/form/list.php');
                break;
                case 'new':
                    get_template_admin('pages/form/create.php');
                break;
                case 'edit':
                    get_template_admin('pages/form/edit.php', $_REQUEST);
                break;
            }
              
            ?>
   </div>
</div>