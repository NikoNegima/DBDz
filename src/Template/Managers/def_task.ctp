<!-- File: src/Template/Volunteers/definirvoluntarios.ctp -->
<?php $this->layout = 'encargados'; ?>

<div class="container">
			
		    <?php 
		        echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
		    ?>

            <div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Datos de la Tarea</h3></div></div></div></div><div class="row">

            <!-- nombre tarea -->
            <div class="row">
                <br>
                <div class="form-group">
                    <label for="user" class="control-label col-md-3">Nombre de la tarea: </label>
                    <div class="col-md-3">
                        <input type="text" name="nombretarea" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            
            <!--Cantidad de voluntarios por tarea -->
            <div class="row">
                <br>
                <div class="form-group">
                    <label for="user" class="control-label col-md-3">Voluntarios a necesitar: </label>
                    <div class="col-md-3">
                        <input type="number" name="cantarea" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <!-- Detalles de la tarea -->
           <div class="row">
                <br>
                <div class="form-group">
                    <label for="user" class="control-label col-md-3">Descripcion: </label>
                    <div class="col-md-9">
                        <textarea type="text" rows="6" name="desctarea" class="form-control"></textarea>
                    </div>
                </div>
           </div>

            <!-- Boton -->
           <div class="row">
                <br>
                <div class = "text-center">
                	<?php
		                echo $this->Form->button('CREAR', ['type' => 'submit', 'class' => 'btn btn-primary']);
		                echo $this->Form->end();
	           		?>
                </div>
                
           </div>
        
        <?php
            echo $this->Form->end();
        ?>

</div>