<!-- File: src/Template/Volunteers/definirvoluntarios.ctp -->
<?php $this->layout = 'encargados';?>

<div class="container">

    <?php 
        echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
    ?>

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Solicitar voluntarios</h3></div></div></div></div><div class="row">


		<div class="row">  	
	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:25%">Nombre</div>
							<div class="elementoHeader" style="width:25%">Area</div>
							<div class="elementoHeader" style="width:25%">Ranking</div>
							<div class="elementoHeader" style="width:25%">¿Solicitar?</div>

							<!--
							<?php foreach ($managers as $manager): ?> 
								<option value=<?php echo $manager->id;?>><?php echo $manager->name;?></option>
							<?php endforeach; ?>-->

						</div>

					<?php foreach ($vol as $voluntario): ?> 	
						<div class="fila">

							<div class = "elemento" style="width:25%"> <?php echo $voluntario->name . " " . $voluntario->last_name_first; ?> </div>
							<div class = "elemento" style="width:25%"> <?php echo $voluntario->performance_area; ?> </div>
							<div class = "elemento" style="width:25%"> <?php echo $voluntario->experience; ?> </div>
							<div class = "elemento" style="width:25%"> 
							<!-- Combobox donde se muestran las tareas de la mision --> 
								<select name = <?php echo $voluntario->id;?> >
								
									<?php foreach ($mission_tasks as $tasks): ?>
										
										<option value=<?php echo $tasks['id']; ?>> <?php echo $tasks->task_name ?></option>

									<?php endforeach; ?>
								</select>	

							</div>

						</div>
					<?php endforeach; ?>
																						
					</div>
				</div>
				<br>
	    </div>

	    <div class="row">
			<div class="text-center">
		        		           	<?php
            	echo $this->Form->button('Terminar', ['type' => 'submit', 'class' => 'btn btn-primary']);
        	?>
		    </div>
		</div>


<?php
        echo $this->Form->end();
    ?>

</div>
</body>
</html>