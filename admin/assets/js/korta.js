var $= jQuery;

$(document).on('click','.create-component',function(){
   var TypeElement = $(this).data('type');
   console.log(TypeElement)
});    