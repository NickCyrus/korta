<script>
    function add<?php echo $uniqId ?>(obj){
        var ul_parent = $(obj).parent()
        ul_parent.append(ul_parent.find('.clone').html())
    }

    function deleteElement<?php echo $uniqId ?>(obj){
        if (confirm('¿Desea eliminar esta opción de seleccion?')){
            $(obj).parent().parent('li').remove();
        }
    }

    function deleteParent<?php echo $uniqId ?>(obj){
        if (confirm('¿Desea eliminar este campo?')){
            $(obj).parents('.nc-cards').remove();
        }
    }
</script>