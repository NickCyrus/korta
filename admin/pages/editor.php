<?php 
        if (isset($_POST)){
             pre($_POST);
        }
?>
<form action="?page=<?php echo $_GET["page"]?>" method="post">
<textarea name="editor_zas" id="editor_zas"><?php //esc_textarea('') ?></textarea>
    <button>Guardar</button>
</form>
<script>
    jQuery(document).ready(function($) {
      var editor = wp.codeEditor.initialize($('#editor_zas'), cm_settings);
    })
</script>