<?php
   
   $alert_msg = 'Información guardada correctamente';
   $args = [];
   if (isset($_POST["btn-save"])){
        
        if (isset($_POST['order_tax'])){
                zas_update_option('order_cat_res',$_POST['order_tax']);
                $alert = true;
        } 
        
        if (isset($_POST["theme-config"])){
            foreach($_POST["theme-config"] as $key=>$value){
                zas_update_option($key,$value);
            }   
            $alert = true;
        } 
        
   }
   
   $orden = zas_get_option('order_cat_res');
   
   /*
     'orderby' => 'post__in', 
      'post__in' => array(883, 563, 568, 106),
        [term_id] => 40
        [name] => Italiano
        [slug] => italiano
        [term_group] => 0
        [term_taxonomy_id] => 40
        [taxonomy] => categorias-restaurantes
        [description] => 
        [parent] => 0
        [count] => 0
        [filter] => raw
   */
   
   if ($orden){
      $order_id = implode(',',$orden);
      $args = ['order_custom' => "ORDER BY FIELD(t.term_id,{$order_id})"];
   }
   
   
   $tax = get_zos_tax_cat_res($args);
   $num = zas_get_option('num_cat_res' , 6);
?>
<script src="https://cdn.tailwindcss.com"></script>
<form action="?page=<?php echo $_GET["page"]?>" method="post">
    <div class="border-b border-gray-900/10 pb-12 bg-white p-5 m-5 rounded-lg shadow-lg">
    
        <?php
            if ($alert && $alert_msg){
                echo alert_html('success','Información guardada correctamente.');  
            }
        ?>

      <h2 class="text-base/7 font-semibold text-gray-900">Elementos Home</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Configuración de elementos en la Home</p>

      <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-12">
          <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Lista de categorías restaurantes</label>
          <div class="mt-2">
            <div class="box-content-tax-cat-res" id="box-content-tax-cat-res">
                <?php if ($tax){
                        $i = 1;
                        foreach($tax as $item){
                            $args = (array)$item;
                            $args['class'] = ($i <= $num) ? 'active' : '';
                            $html = get_template_zas('/template/item-tax-cat-res.php', $args , true);
                            echo "{$html}";
                            $i++;
                        }
                    
                } ?>
                
            </div>
          </div>
        </div>
        
        <div class="sm:col-span-1">
          <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Numeros de categorias </label>
          <div class="mt-2">
            <input type="number" name="theme-config[num_cat_res]" value="<?php echo zas_get_option('num_cat_res' , 6) ?>" class="!rounded-lg text-center block w-full px-3 py-1.5 text-base">
          </div>
        </div>
        
        <div class="sm:col-span-12">
            <button name="btn-save" class="rounded bg-[#ff4d05] text-[#FFF] shadow inline py-2 px-5 font-medium">Guardar</button>
        </input>
    </div>
 
</form>