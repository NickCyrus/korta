var $= jQuery;

$(document).ready(function(){

      $(document).on('click','.create-component',function(){
         var TypeElement = $(this).data('type');
         
         var opc = {
                     opc : 'component',
                     TypeElement :  TypeElement,
                     success: function(rs){
                           if (rs){
                              if (rs.html) $('#form-element-korta #form-element-korta-ul').append('<li>'+rs.html+'</li>');
                              $('#form-element-korta #form-element-korta-ul').sortable();
                           }
                     }

               }

            ajax(opc);

      });    

      $(document).on('click','.cards-toggle .nc-card-header',function(){

            var cardbody =$(this).next('.nc-card-body');
            if (cardbody.is(':visible')){
               cardbody.hide()
            }else{
               cardbody.show()
            }

      })

      $(document).on('keyup change','.write-title',function(){
            $(this).parents('.nc-cards').find('.nc-card-header .caption-name').html($(this).val())
      })
      

      $(document).on('click','#btnEventSave',function(){

               $('.nc-form').find('[required]').each(function(index , item){
                     if (!$(item).is(':visible') && !$(item).val()){
                           $(item).parents('.nc-cards').find('.nc-card-header').trigger('click');
                           return false;
                     }
               })

      })

})
