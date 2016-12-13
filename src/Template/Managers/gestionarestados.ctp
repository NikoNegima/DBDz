<!-- File: src/Template/Managers/gestionar_estado.ctp -->
<?php $this->layout = 'encargados'; ?>

	<title>Ver y modificar los estados</title>

				<!--Idea principal: Vista simple, una tabla donde se ven los voluntarios de las emergencias
				Sus datos, los datos de la tarea asignada, el estado, y la posibilidad de cambiar el estado de la dato.
				 -->


	<div class="container">

		<div class="main-row">	
			<div class="col-md-12">
				<h1 class="text-center">Modificar estados de tareas actuales.</h1>
				<br><br>
				<!--Inicia el div de tabla -->
				<div class="tabla text-center">
					<div class="filaHeader">
						<div class="elementoHeader" style="width:33%">Nombre Tarea</div>
						<div class="elementoHeader" style="width:33%">Estado actual</div>
						<div class="elementoHeader" style="width:34%">¿Cambiar?</div>
					</div>
					
					
				</div>

				<div>
					<?php foreach ($tasks as $tarea): ?>

							<div class="elemento" style="width:33%"> <?php echo $tarea->task_name; ?> </div>
							<div class="elemento" style="width:33%"> <?php echo $tarea->task_status; ?> </div>
							<div class="elemento" style="width:33%">
								<select name="tarea" id="">
									<option value="Proceso">En Proceso</option>
									<option value="Cancelada">Cancelada</option>
									<option value="Terminada">Finalizada</option>
								</select>
							</div>

					<?php endforeach; ?>
				</div>

						
			</div>

			<div class="row  text-center">
				<br>
				<br>
				<button class="btn btn-primary">Guardar Cambios</button>
			</div>
				
			<!-- Aqui termina el col-md-12 -->
			</div>
		<!-- Aqui termina el main-row -->
		</div>

	<!--Fin Container -->
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>