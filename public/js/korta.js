var $= jQuery;

$(document).ready(function(){

      $(document).on('submit','.korta-form-control',function(e){

                var textBtn = $('.korta-btn').text();
                e.preventDefault()
                var error = false;
                $(this).find('.required-ckeck').each(function(index , item){
                        var name = $(this).data('control');
                        var label = $(this).data('label');
                        if ( !$(name+':checked').length){
                            alert("Por favor selecione una opción del campo \""+label+"\"");
                            error = true
                            return false;
                        }                          
                })

                var opc = {
                    opc : 'kortasaveform',
                    data :  $(this).serializeJSON(),
                    beforeSend : function(){
                       $('.korta-btn').text('Por favor espere').attr('disabled',true);
                    },
                    success: function(rs){
                        if (rs){
                            if (rs.error) alert(rs.message)
                            if (rs.success) alert(rs.message)
                           resetForm('.korta-form-control');    
                        }
                        $('.korta-btn').text(textBtn).attr('disabled',false);
                    },
                    complete : function(){
                        $('.korta-btn').text(textBtn).attr('disabled',false);
                    } 

              }


              if (!error) ajax(opc);
 
      }) 

      
})