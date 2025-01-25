<?php
/**
 * Plugin Name: Korta
 * Plugin URI: https://luciairureta.com
 * Description: Plugins Personalizado para Korta
 * Version: 1.0
 * Author: Nick Cyrus Lemus Duque
 * Author URI: nickcyrus.dev
 * Text Domain: nc
 * Domain Path: /i18n/languages/
 * Requires PHP: 7.0
 *
 * @package nc
 *
 * https://fontello.com/  Fuentes Iconos Free 
 * https://freeicons.io/ 
 * https://icons.getbootstrap.com/
*/
 
global $wpdb;
global $nc_tbl;
global $tables;

defined( 'ABSPATH' ) || exit;
 
if ( ! defined( 'PATH_PLUGIN' ) )  define( 'PATH_PLUGIN', __DIR__ );
if ( ! defined( 'PATH_PLUGIN_ADMIN' ) )  define( 'PATH_PLUGIN_ADMIN', PATH_PLUGIN.'/admin/' );
if ( ! defined( 'PATH_PLUGIN_PUBLIC' ) )  define( 'PATH_PLUGIN_PUBLIC', PATH_PLUGIN.'/public/' );
if ( ! defined( 'PATH_PLUGIN_URL' ) )  define( 'PATH_PLUGIN_URL', WP_CONTENT_URL.'/plugins/'.basename(__DIR__).'/' );
if ( ! defined( 'PATH_PLUGIN_ADMIN_URL' ) )  define( 'PATH_PLUGIN_ADMIN_URL', WP_CONTENT_URL.'/plugins/'.basename(__DIR__).'/admin/' );
if ( ! defined( 'PATH_PLUGIN_PUBLIC_URL' ) )  define( 'PATH_PLUGIN_PUBLIC_URL', WP_CONTENT_URL.'/plugins/'.basename(__DIR__).'/public/' );

// include_once PATH_PLUGIN . '/tbl.php'; 
include_once PATH_PLUGIN . '/variables.php';
include_once PATH_PLUGIN . '/includes/functions.php';
include_once PATH_PLUGIN . '/class/korta.class.php';
include_once PATH_PLUGIN . '/shortcodes/shortcodes.php';
include_once PATH_PLUGIN . '/vendor/autoload.php';

register_activation_hook(__FILE__, 'korta_install');

function korta_install() {

    global $wpdb;
    global $tables;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');

	if (count($tables)){
			foreach($tables as $table){
				dbDelta($table);
			}
	}
    
}


function korta(){
 	return  new korta();
}

$GLOBALS['korta'] = korta();

