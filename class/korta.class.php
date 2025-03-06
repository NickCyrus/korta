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
 
               // add_submenu_page($this->slug, 'Formularios',  'Formularios',  'manage_options', 'kortaForms', [$this, 'Forms']);
               add_submenu_page($this->slug, 'Solicitudes',  'Solicitudes',  'manage_options', 'kortaRequests', [$this, 'Requests']);
               // add_submenu_page($this->slug, 'Editor',  'Editor',  'manage_options', 'editor', [$this, 'editor']);
            

        }

        public function Forms() {
            return get_template_admin('pages/form.php');
        }

        public function Requests() {
            return get_template_admin('pages/requests.php');
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
                
                $url_plugins =  PATH_PLUGIN_URL;
                
                $css = [ 
                        'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css',
                        "{$url_plugins}public/css/style.css"
                        ];

                foreach ($css as $item) {
                    $ver  = rand();
                    wp_enqueue_style( $this->slug.str_replace('.','-',basename($item)), $item, '', $ver, 'all'  );
                }
    
                $js = [
                        'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js',
                        "{$url_plugins}public/js/jquery.serializejson.js",
                        "{$url_plugins}admin/assets/js/functions.js",
                        "{$url_plugins}public/js/korta.js"
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

                 wp_enqueue_script("jquery");

                // wp_localize_script('jquery', 'cm_settings', $cm_settings);
               
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
                    
					$js = [ 'https://code.jquery.com/ui/1.14.1/jquery-ui.js',
                            'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js',
                            "{$url_plugins}admin/assets/js/jquery.serializejson.js",
                         	"{$url_plugins}admin/assets/js/functions.js",
                            "{$url_plugins}admin/assets/js/korta.js",
							 
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
                         
                    // Editor
                    
                     $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
                     wp_localize_script('jquery', 'cm_settings', $cm_settings);
                     wp_enqueue_script('wp-theme-plugin-editor');
                     wp_enqueue_style('wp-codemirror');
                     wp_enqueue_media();
                     wp_enqueue_editor();

			}
            
            
            /** AJAX */ 
            
            public function ajax(){
                
                $data  = $_REQUEST;
                $data['uniqId'] = uniqid();
                extract($data , EXTR_SKIP);   
    		    
                
    			switch($opc){
                    case 'component':
                        $html  = get_template_admin("components/{$TypeElement}/form.php", $data, true);
                        return wp_send_json(['success'=>true, 'html'=>$html],200);
                    break;
                    case 'kortasaveform':
                        $response = $this->saveFormRecord($data['data']);
                        return wp_send_json($response,200);
                    break;
    			 
    			}
                
                exit();
            }
            
            
            function saveFormRecord($info){
                    global $nc_tbl;

                    extract($info);

                    $record = ['Remitente'=>$Remitente,
                               'Persona_de_contacto'=>$Persona_de_contacto,
                               'Referencia_cliente'=>$Referencia_cliente,
                               'Telefono'=>$Telefono,
                               'N_de_husillos_enviados'=>$N_de_husillos_enviados,
                               'email'=>$email, 
                               'Fecha_envio_cliente'=>$Fecha_envio_cliente,
                               'Observaciones'=>$Observaciones, 
                               ];
                    
                   
                    $recordId =  wp_tbl_insert($nc_tbl['09'], $record);
                    
                   
                    foreach($Referencia_cliente_husillo as $key=>$row){

                                $child = ['Referencia_cliente_husillo'=>$Referencia_cliente_husillo[$key],
                                          'Problema_detectado'=>$Problema_detectado[$key],
                                          'Urgencia'=>$Urgencia[$key],
                                          'Ofertar_antes_de_reparar'=>$Ofertar_antes_de_reparar[$key],
                                          'Croquizar_y_ofertar_husillo_nuevo'=>$Croquizar_y_ofertar_husillo_nuevo[$key],
                                          'Achatarrar_husillos_no_reparables'=>$Achatarrar_husillos_no_reparables[$key],
                                          'Fabricante_de_la_maquina'=>$Fabricante_de_la_maquina[$key],
                                          'Modelo_de_maquina'=>$Modelo_de_maquina[$key],
                                          'ID_formulario'=> $recordId
                                        ];
                                pre($child);

                                wp_tbl_insert($nc_tbl['10'] , $child);
                                $key++;              
                    }           
                    
                    return $info;

                    $formId = getInputForm($info['kortaform']);
                    $array_exlude = ['kortaform'];
                    foreach($info as $key=>$row){
                            if (!in_array($key,$array_exlude)){
                                $record[$key] = getInputForm($row);
                            }
                    }
                    
                    $form      = get_korta_form($formId);
                    $formJson  = json_decode($form->json);
                    $formField = get_korta_form_fields($formId);
                    
                    if ($formField){
                        foreach($formField as $field_mail){
                            if ($field_mail->type == 'email'){
                                if (isset($record["fld_{$field_mail->id}"]) && $record["fld_{$field_mail->id}"]){
                                    $to[] = $record["fld_{$field_mail->id}"];    
                                }
                            }
                            $info  = json_decode($field_mail->json);
                            
                            if (!in_array($field_mail->type, ['accept'])){
                                $lablesByKey["fld_{$field_mail->id}"] = $info->label;
                            }

                        }


                    }
                    
                   
                    $recordId          =  wp_tbl_insert($form->table_name, $record);
                    $code              =  "KT-{$recordId}-".rand(99,9999);
                    $recordIdRel       = wp_tbl_insert(getNameTbl('formrecord'), ['code'=>$code , 'formid'=>$formId, 'recordid'=>$recordId, 'is_new'=>1,'created_at'=>date("Y-m-d"),'is_deleted'=>0]);    

                    $data['message'] = $formJson->msg_register_success;
                    $data['success'] = true;

                    $record['number-request']      = $code;
                    
                    $template     = get_template_admin('mail/template.html',[],true);
                    
                    $body_mail = korta_mail_replace($form->notification_receipt,$record);
                    $body_mail = korta_mail_replace($template,['CONTENT'=>$body_mail,'URL_LOGO'=>get_custom_logo_url()]);
                    $formJson->mail_subject = korta_mail_replace($formJson->mail_subject,$record);

                    /* Build Pdf */
                    $templatePdf  = get_template_admin('pdf/template.html',[],true);
                    
                    if ($lablesByKey){
                            $codeNumber  = $lablesByKey['number-request'];
                            $pdf_content = "<table class='table'>
                                                <tr>
                                                    <td class='caption'>CODIGO</td>
                                                    <td class='value'><b>{$code}</b></td>
                                                </tr>";
                            foreach($lablesByKey as $key=>$lablesByKeyItem){
                                $lablesByKeyItem = strtoupper($lablesByKeyItem);
                                 $valueInfo  = getValueForm($record[$key]);
                                $pdf_content .="<tr>
                                                    <td class='caption'>{$lablesByKeyItem}</td>
                                                    <td class='value'>{$valueInfo}</td>
                                                </tr>";
                            }
                    }

                    $pdf_content  .= "</table>";
                    
                    $templatePdf  = korta_mail_replace($templatePdf,['CONTENT'=>$pdf_content,'URL_LOGO'=>get_custom_logo_path()]);
                   
                    $attc =  makePDF("{$code}.pdf",$templatePdf);

                    if (isset($to) && $to){
                          $send = korta_mail($to ,  $formJson->mail_subject ?? 'Korta' , $body_mail, '' , [$attc]) ;
                          wp_tbl_update($recordIdRel, getNameTbl('formrecord'), ['is_send'=>$send]);
                          
                    }
                    
                    if ($form->notification_mail){
                        $subjecAdmin     = "Se ha registrado una nueva solicitud {$code}";
                        $body_mail_admin = korta_mail_replace($template,['CONTENT'=>$pdf_content,'URL_LOGO'=>get_custom_logo_url()]);
                        korta_mail($form->notification_mail ,  $subjecAdmin , $body_mail_admin, '' , [$attc]) ;
                    }  
                    
                    @unlink($attc);

                    /*
                        pre($form);
                        pre($to);
                        pre($record);
                    */

                    return $data;

            } 

   }