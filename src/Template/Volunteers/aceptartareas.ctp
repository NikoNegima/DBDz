<!-- File: src/Template/Volunteers/aceptartareas.ctp -->
<?php $this->layout = 'voluntarios'; ?>



<title>Aceptar Tareas</title>



				<!--Idea principal: Tabla con los datos del encargado, la mision y la tarea.
				Y un boton que nos dice si acepta la tarea o no. (Asumiendo que una tarea x voluntario ) -->


	<div class="container">

		<div class="main-row">
			<div class="col-md-12">
				<h1 class="text-center">Solicitudes Requeridas</h1>
				<br><br>
				<!--Inicia el div de tabla -->
				<div class="tabla text-center">
					<div class="filaHeader">
						<div class="elementoHeader">Nombre Encargado</div>
						<div class="elementoHeader">Rut</div>
						<div class="elementoHeader">Mision</div>
						<div class="elementoHeader">Lugar</div>
						<div class="elementoHeader">Tarea</div>
						<div class="elementoHeader">Habilidad Req.</div>
						<div class="elementoHeader">Aceptar Solicitud</div>
					</div>
					<div class="fila">
						<!--Estos datos se recogen de la BD (GONZA SABE COMO) -->
						<div class="elemento">1</div>
						<div class="elemento">2</div>
						<div class="elemento">3</div>
						<div class="elemento">4</div>
						<div class="elemento">5</div>
						<div class="elemento">6</div>
						<div class="elemento text-center" style="">
							<button style="padding:3px 30px" class="btn btn-primary">Eliminar</button>
						</div>
					</div>
				<!--Aqui termina la tabla  -->
				</div>
			<br>
			<br>
			<!--Envia las solicitudes a los voluntarios con tareas asignadas -->
			<button class="btn btn-primary pull-left">Volver</button>	
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