<?php

class korta {

        public $slug  = 'korta';

        public function __construct(){
             $this->checkRequeriment();
        }

        public function checkRequeriment(){
            add_action('wp_enqueue_scripts',[ $this, 'registerCssAndJsFront' ] , 20);
            add_action('admin_head', [ $this, 'registerCssAndJsInHead' ] , 20 );
            add_action('admin_enqueue_scripts', [ $this, 'registerCssAndJsAdmin' ] , 20 );
            add_action('wp_ajax_ajax_korta', array( $this, 'ajax' ) );
            add_action('wp_ajax_nopriv_ajax_korta' , array( $this, 'ajax' ));
            add_action('admin_menu',[ $this, 'setMenuOptions' ] , 20);
        }   
        
        public function setMenuOptions(){
         
                        
            add_menu_page('KORTA',
                          'KORTA', 
                          'manage_options', 
                          $this->slug,
                          [$this, 'welcome'],
                          PATH_PLUGIN_URL.'/korta-logo-ico.svg',
                          1
                        );
 
               add_submenu_page($this->slug, 'Formularios',  'Configuración',  'manage_options', 'config', [$this, 'config']);
               add_submenu_page($this->slug, 'Solicitudes',  'Home',  'manage_options', 'Home', [$this, 'home']);
               // add_submenu_page($this->slug, 'Editor',  'Editor',  'manage_options', 'editor', [$this, 'editor']);
            

        }

        public function config() {
            return get_template_admin('pages/config.php');
        }

        public function home() {
            return get_template_admin('pages/home.php');
        }

        public function editor(){
            return get_template_admin('pages/editor.php');
        }
        
        public function welcome(){
            return get_template_admin('pages/welcome.php');
        }
         
        public function registerCssAndJsInHead(){
			echo '<script type="text/javascript"> var KORTAURLADMIN = "'.PATH_PLUGIN_ADMIN_URL.'";</script>';
		}
			
        public function registerCssAndJsFront(){
                
                $url_plugins =  PATH_PLUGIN_PUBLIC_URL;
                
                $css = [ 
                        'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css',
                    
                        ];

                foreach ($css as $item) {
                    $ver  = rand();
                    wp_enqueue_style( $this->slug.str_replace('.','-',basename($item)), $item, '', $ver, 'all'  );
                }
    
                $js = [
                        'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js',
                        $url_plugins.'js/jquery.serializejson.js'
                      ];
    
                foreach ($js as $item) {
                    $ver  = rand();
                    wp_enqueue_script( $this->slug.str_replace('.','-',basename($item)), $item, 'jQuery', $ver  , true );
                }
    
                wp_localize_script( $this->slug.str_replace('.','-',basename($item)), 'ajax_korta',
                        array(
                                'url'    => admin_url( 'admin-ajax.php' ),
                                'nonce'  => wp_create_nonce( 'KORTA-ajax-nonce' ),
                                'action' => 'ajax_korta'
                            )
                 );
               
        }

		public function registerCssAndJsAdmin(){
                     
                    $url_plugins =  PATH_PLUGIN_URL;

					$css = ['https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css',
                            "{$url_plugins}bootstrap-icons/font/bootstrap-icons.min.css",
                            "{$url_plugins}/admin/assets/css/bootstrap.css",
                            "{$url_plugins}admin/assets/css/style.css"
						   ];

					foreach ($css as $item) {
						$ver  = rand();
						wp_enqueue_style( $this->slug.str_replace('.','-',basename($item)), $item, '', $ver, 'all'  );
					}
                    
                    $jsHead = ['https://cdn.tailwindcss.com'];
                    
					$js = [ 'https://code.jquery.com/ui/1.14.1/jquery-ui.js',
                            'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js',
                         	"{$url_plugins}admin/assets/js/korta.js",
							 
						   ];
                    /*      
					foreach ($jsHead as $item) {
						$ver  = rand();
						// wp_enqueue_script( $this->slug.str_replace('.','-',basename($item)), $item, 'jQuery', $ver );
					}
					*/

					foreach ($js as $item) {
						$ver  = rand();
						wp_enqueue_script( $this->slug.str_replace('.','-',basename($item)), $item, 'jQuery', $ver  , true );
					}


					wp_localize_script( $this->slug.str_replace('.','-',basename($item)), 'ajax_korta',
                        array(
                                'url'    => admin_url( 'admin-ajax.php' ),
                                'nonce'  => wp_create_nonce( 'KORTA-ajax-nonce' ),
                                'action' => 'ajax_korta'
                            )
                    );
                         
                    // Editor
                    
                     $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
                     wp_localize_script('jquery', 'cm_settings', $cm_settings);
                     wp_enqueue_script('wp-theme-plugin-editor');
                     wp_enqueue_style('wp-codemirror');
                    

			}
            
            
            /** AJAX */ 
            
            public function ajax(){
                
                $data  = $_REQUEST;
                extract($data , EXTR_SKIP);   
    		    
                
    			switch($opc){
                    case 'create_account':
                    break;
                    
    			 
    			}
                
                exit();
            }
            
            
             

   }