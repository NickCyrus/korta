<?php
   
   $alert_msg = 'Información guardada correctamente';
    
   if (isset($_POST["btn-save"])){
        if (isset($_POST["theme-config"])){
            foreach($_POST["theme-config"] as $key=>$value){
                zas_update_option($key,$value);
            }   
            $alert = true;
        } 
   }
    
?>
<script src="https://cdn.tailwindcss.com"></script>
<form action="?page=<?php echo $_GET["page"]?>" method="post">
    <div class="border-b border-gray-900/10 pb-12 bg-white p-5 m-5 rounded-lg shadow-lg">
    
        <?php
            if ($alert && $alert_msg){
                echo alert_html('success','Información guardada correctamente.');  
            }
        ?>

      <h2 class="text-base/7 font-semibold text-gray-900">Configuración</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Configuración de opciones generales</p>

      <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm/6 font-medium text-gray-900"><i class="dashicons-before dashicons-smartphone"></i> Link APP Google</label>
          <div class="mt-2">
            <input type="text" name="theme-config[app_link_google]" value="<?php echo zas_get_option('app_link_google') ?>" class="!rounded-lg block w-full px-3 py-1.5 text-base">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm/6 font-medium text-gray-900"><i class="dashicons-before dashicons-smartphone"></i> Link APP Apple</label>
          <div class="mt-2">
            <input type="text" name="theme-config[app_link_apple]" value="<?php echo zas_get_option('app_link_apple') ?>" class="!rounded-lg block w-full px-3 py-1.5 text-base">
          </div>
        </div>
        
        <button name="btn-save" class="rounded bg-[#ff4d05] text-[#FFF] shadow inline py-2 font-medium">Guardar</button>
    </div>
 
</form>