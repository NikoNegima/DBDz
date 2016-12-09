<!-- File: src/Template/Managers/gestionar_estado.ctp -->
<?php $this->layout = 'encargados'; ?>

	<title>Ver y modificar los estados</title>

				<!--Idea principal: Vista simple, una tabla donde se ven los voluntarios de las emergencias
				Sus datos, los datos de la tarea asignada, el estado, y la posibilidad de cambiar el estado de la dato.
				 -->


	<div class="container">

		<div class="main-row">
			<div class="col-md-12">
				<h1 class="text-center">Asignar voluntarios a las tareas creadas.</h1>
				<br><br>
				<!--Inicia el div de tabla -->
				<div class="tabla text-center">
					<div class="filaHeader">
						<div class="elementoHeader">Nombre</div>
						<div class="elementoHeader">Apellido</div>
						<div class="elementoHeader">Rut</div>
						<div class="elementoHeader">Experiencia</div>
						<div class="elementoHeader">Nombre Tarea</div>
						<div class="elementoHeader">Estado Actual</div>
						<div class="elementoHeader">Nuevo Estado</div>
					</div>
					<div class="fila">
						<!--Estos datos se recogen de la BD-->
						<div class="elemento">1</div>
						<div class="elemento">2</div>
						<div class="elemento">3</div>
						<div class="elemento">4</div>
						<div class="elemento">5</div>
						<div class="elemento">6</div>
						<div class="elemento">
							<!--Esta wea no se si puede hacer... guardar los elementos de la
							vista anterior y meterlos en el combo box -->
							<select name="tarea" id="">
								<option value="N">Creada</option>
								<option value="1">En Proceso</option>
								<option value="2">Cancelada</option>
								<option value="3">Finalizada</option>
							</select>
						</div>
					</div>
				<!--Aqui termina la tabla  -->
				</div>
			<br>
			<br>
			<button class="btn btn-primary pull-right">Guardar Cambios</button>	
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