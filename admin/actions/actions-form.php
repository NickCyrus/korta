<?php
    global $wpdb;
    global $nc_tbl;
   

    if (isset($_REQUEST["EventSaveForm"])){
        
       
        $args = ['name'=>$_REQUEST["title"],
                 'notification_mail'=>$_REQUEST['notification_mail'],
                 'notification_receipt'=>$_REQUEST['notification_receipt'],
                 'notification_receipt'=>$_REQUEST['notification_receipt'],
                 'json'=>json_encode($_REQUEST)
                ];

        if (!$_REQUEST['id']){
            $args['table_name'] = "{$wpdb->prefix}kortaform_".uniqid();  
        }

        $id = wp_tbl_insert_or_update($_REQUEST['id'] , $nc_tbl['form'] , $args);
        
        if (isset($_REQUEST['kortaField']["field"])){
                foreach($_REQUEST['kortaField'] as $fields){
                        $i = 1;
                        foreach($fields as $field){
                            remove_quotes($field);
                            $args = ['formid'=>$id,
                                     'type'=>$field['type'],
                                     'orden'=>$i,
                                     'json'=>json_encode($field)];
                            wp_tbl_insert_or_update($field['id'] , $nc_tbl['formdetails'] , $args);
                            $i++;
                        }
                }
        }
        
        $formInfo =  wp_tbl_by_id($id , $nc_tbl['form']);
        create_table_form($formInfo);

        $msg_success = 'Formulario actualizado correctamente';
       
    }

?>