var modal;
var nc_ajax;

function ajax(options = {}){
  
    var defaul = {
                     url : ajax_korta.url,
                     action : ajax_korta.action,
                     type: 'POST',
                     dataType : 'json',
                     nonce : ajax_korta.nonce,
                     beforeSend : ()=>{},
                     success : ()=>{},
                     opc : ''
                }
 
            var opc = jQuery.extend( defaul , options );
                         
            nc_ajax = jQuery.ajax({
                         beforeSend :opc.beforeSend,
                         type: opc.type,
                         url: opc.url,
                         dataType: opc.dataType,
                         data: jQuery.extend({action : opc.action, 
                                         nonce : opc.nonce , 
                                         opc : opc.opc
                               },opc ),
                         
                         success: opc.success
                         })
}
 
function alert(mensaje){
    jQuery.alert({
         title: '',
         content: mensaje,
         useBootstrap : false
     });
}

function format_date(fecha){
    var split_date = fecha.split('-');
    return split_date[2]+"/"+split_date[1]+"/"+split_date[0];
}

const inEuroUmrechnen = (eineZahl) => {
    return new Intl.NumberFormat("de-DE", {
      style: "currency",
      currency: "EUR",
    }).format(eineZahl);
};


function wait(msg , boxWidth= '30%'){
    
    if (jQuery(window).width() <= 575.98 ){
        boxWidth = '90%';
    }
    
    if (modal) closeWait();
    
    modal = $.dialog({
                        title: '',
                        content: msg,
                        draggable: true,
                        closeIcon: false,
                         boxWidth: boxWidth,
                        useBootstrap: false 
                       });
}

function closeWait(){
    modal.close();
}

function resetForm(form){
  jQuery(form).trigger("reset");
}