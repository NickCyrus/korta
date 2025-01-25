<?php
    global $wpdb;
    global $nc_tbl;
   
    
    if (isset($_REQUEST["action"]) && $_REQUEST["action"]=='delete' ){
        $id = $_REQUEST["id"];
        wp_query("UPDATE {$nc_tbl['formrecord']} SET is_deleted=1 WHERE id={$id}");
    }

    if (isset($_REQUEST["kotan-send-response"])){
        $args = [
                    'formid'=>$_REQUEST['formid'],
                    'recordid'=>$_REQUEST['recordid'],
                    'response'=>$_REQUEST['response'],
                    'resposedate'=>date("Y-m-d H:i:s"),
                    'json'=>json_encode($_REQUEST),
                    'is_deleted'=>0,
                ];
        wp_tbl_insert($nc_tbl['formresponse'], $args);
        
        $successMsg = "Respuesta registrada correctramente";
        $code   = $_REQUEST['code'];
        $subjec = "Korta - Respuesta caso #{$code}";
        $body   = get_template_admin('mail/template.html',[],true);    
        $body   = korta_mail_replace($body,['CONTENT'=>$_REQUEST["response"],'URL_LOGO'=>get_custom_logo_url()]);    
        korta_mail($_REQUEST['to'], $subjec, $body);

    }

    
?>