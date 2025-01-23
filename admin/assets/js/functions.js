var modal;

function ajax(options = {}){
  
    var defaul = {
                     url : ajax_nc.url,
                     action : ajax_nc.action,
                     type: 'POST',
                     dataType : 'json',
                     nonce : ajax_nc.nonce,
                     beforeSend : ()=>{},
                     success : ()=>{},
                     opc : ''
                }
 
            var opc = nc.extend( defaul , options );
                         
            nc_ajax = nc.ajax({
                         beforeSend :opc.beforeSend,
                         type: opc.type,
                         url: opc.url,
                         dataType: opc.dataType,
                         data: nc.extend({action : opc.action, 
                                         nonce : opc.nonce , 
                                         opc : opc.opc
                               },opc ),
                         
                         success: opc.success
                         })
}
 
function alert(mensaje){
     nc.alert({
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