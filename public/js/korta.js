var $= jQuery;

$(document).ready(function(){
      
    
    $(document).on('husillos',function(e){
         var tableHusillo = $('#box-husillo-container');
         var nhusillos    = $('.N_de_husillos_enviados').val();


         console.log( tableHusillo.find('table').length )
         console.log( nhusillos )


         if (tableHusillo.find('table').length < nhusillos){
                var dif = nhusillos - tableHusillo.find('table').length;
                for(i=0;i<dif;i++){
                    tableHusillo.append($('#table-husillo').html())
                }
         }else{
                $('.N_de_husillos_enviados').val( tableHusillo.find('table').length )
         }

    })

    $(document).on('change','.N_de_husillos_enviados',function(e){
        $(document).trigger('husillos');
    })

    $(document).on('click','.eventClose',function(e){
        $(this).parents('table').remove();
        $('.N_de_husillos_enviados').val( $('#box-husillo-container table').length )
        $(document).trigger('husillos');
    })
    

    $(document).on('submit','#korta-form-husillo',function(e){
     
                var textBtn = $('.korta-btn').text();
                e.preventDefault()
                var error = false;
                
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
                            // resetForm('.korta-form-control');    
                            // $('#box-husillo-container').html('')
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