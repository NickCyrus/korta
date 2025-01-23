<div class="nc-rounded nc-bg-white nc-p-2 nc-my-3 nc-px-4">
    <form action="<?php echo _link('save')?>" method="post" class="nc-form">
     <div class="nc-row nc-p-3">   
            <div class="box-form nc-col-10">
                    <div class="nc-mb-3">
                        <label class="nc-form-label nc-d-block nc-fw-bold">Nombre del formulario</label>
                        <input type="email" class="nc-form-control" id="title" name="title" required>
                    </div>
                    <fieldset>
                        <legend>Elementos del formulario</legend>
                        <div class="nc-border">

                        </div>        
                    </fieldset>
                    
            </div>
            
            <div class="box-actions nc-col nc-p-3"> 
                <button type="submit" class="nc-btn nc-btn-primary nc-w-100 nc-my-2">
                    <i class="bi bi-floppy nc-mr-1"></i> Guardar</button>
                <div>
                    <?php get_template_admin('components/list.php'); ?>
                </div>
            </div>
     </div>
    </form>

</div>