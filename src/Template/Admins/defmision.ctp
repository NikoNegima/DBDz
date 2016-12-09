<!-- File: src/Template/Admins/crearemergencia	.ctp -->
<?php $this->layout = 'administradores'; ?>

<title>Definir Misión</title>
	
<div class="container">


            <div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Datos de la Misión</h3></div></div></div></div><div class="row">

            <section class="main-row">
            <?php 
                echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
            ?>
          
            <!-- Combobox: ENCARGADOS-->
            <div class="form-group">
                <label for="comuna" class="control-label col-md-3 ">Encargado a Asignar: </label>
                <div class="col-md-6 col-md-offset combobox" style="overflow-x: visible;">
                    <select name="encargado" class="form-control" id="region">
                        <?php foreach ($managers as $manager): ?>
                        	<?php $fullname = $manager['name'] . " " . $manager['last_name_first'];?>
                            <option value=<?php echo $manager->id;?>><?php echo $fullname;?></option>  
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Nombre de la mision -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Nombre de la Misión: </label>
                <div class="col-md-6">
                    <input type="text" name="nombremision" class="form-control" placeholder="Ingrese Nombre de la mision">
                </div>
            </div>

            <!-- cantidad de voluntarios para la mision -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Cantidad de voluntarios: </label>
                <div class="col-md-3">
                    <input type="text" name="cantvoluntarios" class="form-control" placeholder="cantidad de voluntarios">
                </div>
            </div>
         
            </section>
            <div class="pull-right">
            <?php
                echo $this->Form->button('CREAR', ['type' => 'submit', 'class' => 'btn btn-primary']);
                echo $this->Form->end();
            ?>

</div>

	
    </body>
</html>
