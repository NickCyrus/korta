var $= jQuery;

$(document).ready(function(){

      $(document).on('submit','.korta-form-control',function(e){

                $(this).find('.required-ckeck').each(function(index , item){
                        var name = $(this).data('control');
                        var label = $(this).data('label');
                        if ( !$(name+':checked').length){
                            alert("Por favor selecione una opción del campo \""+label+"\"");
                            e.preventDefault()
                            return false;
                        }                         
                })
 
      }) 

      
})