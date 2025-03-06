<?php

    function kortaform_shortcode($atts, $content = null){
        
        global $post;
        
        $prev_attr = $atts;
        $atts = shortcode_atts( ['id' => '','title'=>'','event'=>''], $prev_attr );
        $atts = array_merge($atts , $prev_attr);
 
        return  build_form_korta();


    }


    add_shortcode('kortaform', 'kortaform_shortcode'); 


    function build_form_korta(){
         $id         = uniqid();
         $html       = '<form action="" method="post" enctype="multipart/form-data" class="korta-form-control korta-form-'.$id.'" id="korta-form-husillo">
                            <input type="hidden" name="kortaform" value="'.$id.'" />';   
          
        $html .= get_template_public('form.php',$_REQUEST, true);

        $btn = '<button class="korta-btn elementor-button elementor-size-sm" type="submit">
						<span class="elementor-button-content-wrapper">
												<span class="elementor-button-text">ENVIAR</span>
					    </span>
				</button>';
        return $html.$btn.'</form>'.get_template_public('form-husillo.php',$_REQUEST, true);

    }


    function korta_set_content_type(){
        return "text/html";
    }

    add_filter( 'wp_mail_content_type','korta_set_content_type' );
    
?>
