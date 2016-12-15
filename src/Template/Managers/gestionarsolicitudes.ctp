<!-- File: src/Template/Managers/gestionarsolicitades.ctp -->
<?php $this->layout = 'encargados'; ?>


				<!--Idea principal: Dos tablas. La de la izquierda muestra todos los voluntarios
				(ordenados si es posibles), y se incluye un boton "Solicitar" 
				La segunda tabla, tiene todos los voluntarios que les enviaron solicitud, pero todavia no aceptar
				Se pueden eliminar presionando el boton "Eliminar"-->


	<div class="container">
	
		<div class="main-row">
			<h1 class="text-center">Gestionar Solicitudes</h1>
			<!--Primera Tabla: Voluntarios disponibles para enviar Solicitud -->
			<div class="col-md-6 text-center">
				<h3>Tareas Disponibles para Enviar Solicitudes</h3>
				
				<div class="row"> 
					
					<!-- Se muestran todas las tareas de la mision -->
					<select class="text-center">

						<?php foreach ($mission_tasks as $tasks): ?>
							<option> <?php echo $tasks->task_name; ?> </option>
						<?php endforeach; ?>

					</select>

				<br>
				<br>
				</div>

				<div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:33%">Nombre tarea</div>
							<div class="elementoHeader" style="width:33%">Cantidad voluntarios</div>
							<div class="elementoHeader" style="width:34%">Estado Actual</div>
						</div>

						<div class="fila">
							<!-- Se muestran los elementos de la tarea seleccionada -->
							<div class="elemento" style="width:33%"> <?php echo $tasks->task_name; ?> </div>
							<div class="elemento" style="width:33%"> <?php echo $tasks->volunteer_amount; ?> </div>
							<div class="elemento" style="width:34%"> <?php echo $tasks->task_status; ?> </div>

						</div>
																			
					</div>
				</div>
			</div>
			<!--Termina la primeras 6 columnas -->
			<div class="col-md-6 text-center">
			<!-- Inicia segunda tabla: Solicitudes sin aceptar -->
				<h3 class="text-center">Solicitudes Sin Aceptar a Voluntarios</h3>
				<div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla">
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:20%">Nombre</div>
							<div class="elementoHeader" style="width:20%">Rut</div>
							<div class="elementoHeader" style="width:20%">Area</div>
							<div class="elementoHeader" style="width:20%">Ubicacion Actual</div>
							<div class="elementoHeader" style="width:20%">Enviar Solicitud</div>
						</div>

						<!-- Se recorren los voluntarios disponibles -->
						<div class="fila">

							<?php foreach ($vol as $voluntario): ?>

								<div class="elemento" style="width:20%"> <?php echo $voluntario->name; ?></div>
								<div class="elemento" style="width:20%"> <?php echo $voluntario->rut_volunteer; ?></div>
								<div class="elemento" style="width:20%"> <?php echo $voluntario->performance_area; ?></div>
								<div class="elemento" style="width:20%"> <?php echo $voluntario->actual_ubication; ?></div>
								<div class="elemento" style="width:20%">
									<select>
										<option>NO ENVIAR</option>
										<option>ENVIAR</option>
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
				<
		        <?php
	        		echo $this->Form->button('Guardar Cambios', ['type' => 'submit', 'class' => 'btn btn-primary']);
	        	?>
			</div>
		<!-- Aqui termina el main-row -->
		</div>

	<!--Fin Container -->
	</div>

	<br>
	<br>
	<br>
	<br>	

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>