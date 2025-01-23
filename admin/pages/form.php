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
            }
              
            ?>
   </div>
</div>