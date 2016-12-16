<!-- File: src/Template/Managers/gestionarsolicitades.ctp -->
<?php $this->layout = 'encargados'; ?>


				<!--Idea principal: Dos tablas. La de la izquierda muestra todos los voluntarios
				(ordenados si es posibles), y se incluye un boton "Solicitar" 
				La segunda tabla, tiene todos los voluntarios que les enviaron solicitud, pero todavia no aceptar
				Se pueden eliminar presionando el boton "Eliminar"-->


	<div class="container">

    <?php 
        echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
    ?>
	
		<div class="main-row">
			
			<!--Termina la primeras 6 columnas -->
			<div class="col-md-12 text-center">
			<!-- Inicia segunda tabla: Solicitudes sin aceptar -->
				<h3 class="text-center">Solicitudes Sin Aceptar a Voluntarios</h3>
				<div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla">
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:20%">Nombre</div>
							<div class="elementoHeader" style="width:10%">Rut</div>
							<div class="elementoHeader" style="width:15%">Area</div>
							<div class="elementoHeader" style="width:20%">Ubicacion Actual</div>
							<div class="elementoHeader" style="width:15%">Enviar Solicitud</div>
							<div class="elementoHeader" style="width:20%">Tarea a Solicitar</div>
						</div>

						<!-- Se recorren los voluntarios disponibles -->
						<div class="fila">

							<?php foreach ($vol as $voluntario): ?>

								<div class="elemento" style="width:20%"> <?php echo $voluntario->name . " " . $voluntario->last_name_first; ?></div>
								<div class="elemento" style="width:10%"> <?php echo $voluntario->rut_volunteer; ?></div>
								<div class="elemento" style="width:15%"> <?php echo $voluntario->performance_area; ?></div>
								<div class="elemento" style="width:20%"> <?php echo $voluntario->actual_ubication; ?></div>
								<div class="elemento" style="width:15%">
									<?php echo '<select name="comboboxvol'. $voluntario['id'].'" id="">';?>
										<option value="NO ENVIAR">NO ENVIAR</option>
										<option value="ENVIAR">ENVIAR</option>
									</select>
								</div>
								<div class="elemento" style="width:15%">
									<select name="comboboxtsk" id="">
										<?php foreach ($mission_tasks as $task): ?>
											<option value=<?php echo $task->id;?>><?php echo $task->task_name ?></option>
										<?php endforeach; ?>
									</select>
								</div>


							<?php endforeach; ?>

						</div>
						
					</div>
				</div>
				<br>
				<br>
			</div>

			<div class="row  text-center">
		        <?php
	        		echo $this->Form->button('Guardar Cambios', ['type' => 'submit', 'class' => 'btn btn-primary']);
	        	?>
			</div>
		<!-- Aqui termina el main-row -->
		</div>

	<!--Fin Container -->

    <?php
    	echo $this->Form->end();
    ?>

	</div>

	<br>
	<br>
	<br>
	<br>	

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>