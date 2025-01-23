<?php

if (!function_exists('dia_semana')){
    function dia_semana ($dia, $mes, $ano) {
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $dia  = date("w", mktime(0, 0, 0, (int)$mes, (int)$dia, (int)$ano) );
        return $dia;
    }
}

if (!function_exists('fecha_texto')){
        function fecha_texto($fecha , $texto = 'Hoy es %d de %m del %Y'){
                
                if (!$fecha) return '';
                
                $lista_mes  = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                $lista_dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
                @list($fecha,$hora ) = explode(" ",$fecha);
                @list($ano,$mes,$dia) = explode("-",$fecha);
                $diaActual = dia_semana ($dia, $mes, $ano);
                
                
                if ($texto){
                                    
                    
                    $texto =  str_replace('%dt',$lista_dias[$diaActual],$texto);
                    $texto =  str_replace('%mt', $lista_mes[(int)$mes], $texto);
                    $texto =  str_replace('%yt',$ano,$texto);
                    $texto =  str_replace('%His',$hora,$texto); 
                    $texto =  str_replace('%d',$dia,$texto);
                    $texto =  str_replace('%m',$mes,$texto);
                    $texto =  str_replace('%Y',$ano,$texto);
                }
            
                return $texto;
        }
}

if (!function_exists('uniqidReal')){

        function uniqidReal($lenght = 13) {

            // uniqid gives 13 chars, but you could adjust it to your needs.
            if (function_exists("random_bytes")) {
                $bytes = random_bytes(ceil($lenght / 2));
            } elseif (function_exists("openssl_random_pseudo_bytes")) {
                $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
            } else {
                throw new Exception("no cryptographically secure random function available");
            }
            return substr(bin2hex($bytes), 0, $lenght);
        }
}
if (!function_exists('wp_tbl_update')){

        function wp_tbl_update ($id , $table , $args_update=[]){
            global $wpdb;
            $wpdb->update($table,$args_update, array('id'=>$id));   
        }
}
if (!function_exists('wp_tbl_select')){
        
        function wp_tbl_select($sql){
            global $wpdb;
            return $wpdb->get_results($sql); 
        }
}
if (!function_exists('wp_tbl_row')){
        
        function wp_tbl_row($sql){
            global $wpdb;
            return $wpdb->get_row($sql); 
            
        }
}
if (!function_exists('wp_tbl_by_id')){

        function wp_tbl_by_id($id , $table ,  $field='id'){
            global $wpdb;
            return $wpdb->get_row("SELECT * FROM `{$table}` WHERE `$field`='{$id}'"); 
        }
}
if (!function_exists('wp_tbl_insert')){

        function wp_tbl_insert($table , $args){
            global $wpdb;
            return $wpdb->insert($table, $args);
        }
}
if (!function_exists('wp_tbl_insert_or_update')){

        function wp_tbl_insert_or_update($id='' , $table , $args){
            global $wpdb;
 
            $result = $wpdb->update($table, $args, ['id'=>$id]);
        
            if ($result === FALSE || $result < 1) {
                $exits  = wp_tbl_by_id($id , $table);
                if (!$exits) {
                    $wpdb->insert($table, $args); 
                    return $wpdb->insert_id;
                }else{
                    return $id;
                }
            }

            return $id;
        }
}
if (!function_exists('get_post_info')){
        function get_post_info($field = 'ID'){
        global $post; 
        return $post->$field;  
        }
}
if (!function_exists('formatear_fecha')){

        function formatear_fecha($f , $format = "d/m/Y"){
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'es_ES.UTF-8');
            return date($format,strtotime($f));
        }
}
if (!function_exists('operarFecha')){

        function operarFecha($fecha , $operador='+', $cantidad = 0  , $tipo , $format="Y-m-d"){
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'es_ES.UTF-8');
            $type = array("d"=>'days',"m"=>'month', "y"=>'year', "w"=>'week');
            return date($format,strtotime($fecha."$operador {$cantidad} {$type[$tipo]}"));
        }   
}
if (!function_exists('pre')){

        function pre($var){
            echo '<pre>'.print_r($var,true).'</pre>';
        }
}
if (!function_exists('get_template_plugin')){

        function get_template_plugin($file , $args = [], $return = false ){
            $args  = array_merge($args , ['plgurl'=>PATH_PLUGIN_URL] );
            ob_start();
            extract($args);
            include($file);
            $html = ob_get_contents();
            ob_clean();

            if ($return) 
                return $html;
            else
                echo $html;

        }
}
if (!function_exists('get_template_admin')){
    function get_template_admin($file , $args = [], $return = false ){
        return  get_template_plugin(PATH_PLUGIN_ADMIN."{$file}" , $args, $return);
    }
}
if (!function_exists('get_template_public')){
    function get_template_public($file , $args = [], $return = false ){
        return  get_template_plugin(PATH_PLUGIN_PUBLIC."{$file}" , $args, $return);
    }
}

if (!function_exists('get_template_')){
    function get_template_($file , $args = [], $return = false ){
        return  get_template_plugin(PATH_PLUGIN."{$file}" , $args, $return);
    }
}

if (!function_exists('remove_id_table')){
    function remove_id_table($id , $table){
        global $wpdb;
        $wpdb->delete( $table , array( 'id' => $id));
    }
}

if (!function_exists('remove_where')){
    function remove_where($where , $table){
        global $wpdb;
        $wpdb->delete( $table , $where);
    }
}

if (!function_exists('info_fecha')){

        function info_fecha($fecha = '' , $format="Y-m-d"){
                    
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'es_ES.UTF-8');
            
            if (!$fecha) $fecha  = date("Y-m-d");
            
            $info = new stdClass;   
            $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $dnum = (date('N', strtotime($fecha)));
            $info->maxDate    = operarFecha(date('Y-m-d'),'+',4,'m' , $format );
            $info->currenDay  = date("Y-m-d");
            $info->datecheck  = $fecha;
            $info->datecheckF = formatear_fecha($fecha);
            $info->numerodia  = $dnum;
            $info->dia_text   = $dias[($dnum - 1)];
            
            $info->saturday   = operarFecha($fecha,'-',2,'d' , $format );
            
            $info->prevday   = operarFecha($fecha,'-',1,'d' , $format );
            $info->nextday   = operarFecha($fecha,'+',2,'d' , $format);
            $info->nextweek  = operarFecha($fecha,'+',1,'w' , $format);
                    
            return $info;   

        }
}


if (!function_exists('alert_html')){
    function alert_html($type='info',$msg='' , $color=''){
        $html = '<div class="m-2 flex items-center p-4 mb-4 text-sm text-%s-800 border border-%s-300 rounded-lg bg-%s-50 dark:bg-%s-800 dark:text-%s-400 dark:border-%s-800" role="alert">
                      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
                      <div>%s</div>
                </div>';
        if (!$color){        
            switch($type){
                default:
                    $color = 'blue';
                break;
                case 'error':
                    $color = 'red';
                break;
                case 'warning':
                    $color = 'yellow';
                break;
                case 'success':
                    $color = 'green';
                break;
            }
        }      
     
        return sprintf($html, $color,$color,$color,$color,$color,$color ,$msg);
    }
}

if (!function_exists('PATH_update_option')){
    function PATH_update_option( $option, $value=''){
        return update_option("PATH_{$option}",$value);
    }
}

if (!function_exists('PATH_get_option')){
    function PATH_get_option( $option , $dafult = ''){
        return get_option("PATH_{$option}",$dafult);
    }
}

if (!function_exists('getContentById')){
    function getContentById($postid){
            return apply_filters('the_content', get_post_field('post_content', $postid));
    }
}

if (!function_exists('get_product_all')){
    function get_product_all( $args = array() ){
        $defaul = array(
                'post_type'  => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1 
        );
        
        $args = array_merge($defaul , $args);
       
        return  new WP_Query( $args );
    }
}

if (!function_exists('get_zos_tax_cat_res')){
    
    function get_zos_tax_cat_res( $args = array() ){
        
        global $PATH_var;
        
        $cat_args = array(
            'hide_empty'    => false, 
        );
    
        $option = array_merge($cat_args, $args);
        
        return get_terms($PATH_var['cat-res'], $option);
    
    }
    
}
if (!function_exists('get_terms_ordered')){
function get_terms_ordered( $taxonomy = '', $args = [], $term_order = '', $sort_by = 'slug' )
{
    // Check if we have a taxonomy set and if the taxonomy is valid. Return false on failure
    if ( !$taxonomy )
        return false;

    if ( !taxonomy_exists( $taxonomy ) )
        return false;

    // Get our terms    
        $terms = get_terms( $taxonomy, $args ); 
    
        // Check if we have terms to display. If not, return false
        if ( empty( $terms ) || is_wp_error( $terms ) )
            return false;
    
        /** 
         * We have made it to here, lets continue to output our terms
         * Lets first check if we have a custom sort order. If not, return our
         * object of terms as is
         */
        if ( !$term_order )
            return $terms;
    
        // Check if $term_order is an array, if not, convert the string to an array
        if ( !is_array( $term_order ) ) {
            // Remove white spaces before and after the comma and convert string to an array
            $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $term_order, FILTER_SANITIZE_STRING ) );
            $term_order = explode( ',', $no_whitespaces );
        }
    
        // Remove the set of terms from the $terms array so we can move them to the front in our custom order
     $array_a = [];
     $array_b = [];
        foreach ( $terms as $term ) {
            if ( in_array( $term->$sort_by, $term_order ) ) {
                $array_a[] = $term;
            } else {
                $array_b[] = $term;
            }
        }
    
        /**
         * If we have a custom term order, lets sort our array of terms
         * $term_order can be a comma separated string of slugs or names or an array
         */
        usort( $array_a, function ( $a, $b ) use( $term_order, $sort_by )
        {
            // Flip the array
            $term_order = array_flip( $term_order );
    
            return $term_order[$a->$sort_by] - $term_order[$b->$sort_by];
        });
    
        return array_merge( $array_a, $array_b );
    } 
}


function gto_forced_order($pieces,$taxonomies='',$args) {
     
    if (isset($args['order_custom'])){
        $pieces['orderby'] = $args['order_custom'];
    }
    
  return $pieces;
}
add_filter('terms_clauses','gto_forced_order',1,3);


if (!function_exists('getContentElementor')){
    function getContentElementor($post_ID){
        $contentElementor = '';
        if (class_exists("\\Elementor\\Plugin")) {
             global $post;
             //$post = get_post($productId);
             $pluginElementor = \Elementor\Plugin::instance();
             $contentElementor = $pluginElementor->frontend->get_builder_content($post_ID);
        }
            echo $contentElementor;
    }
}

if (!function_exists('getRolUser')){
    function getRolUser() {
    
      if( is_user_logged_in() ) {
         $user = wp_get_current_user();
         $roles = ( array ) $user->roles;
         return array_values($roles);    
      } else {
         return [];
      }
}
}

function logoutUser(){
    if (isset($_REQUEST["wpsessionexpired"])){ 
        wp_logout();
    }
}


function redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

add_action('init', 'logoutUser');
add_action( 'wp_logout', 'redirect_after_logout');


if (!function_exists('getLink')){
    function getLinkDashboard() {
        return site_url('dashboard');
    }
}

if (!function_exists('_link')){
    function _link($add='') {
        return (!$add) ? "?page=".$_REQUEST["page"] : "?page=".$_REQUEST["page"]."&{$add}";
    }
}

