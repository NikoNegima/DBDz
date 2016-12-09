<!-- File: src/Template/Volunteers/asignarhabilidades.ctp -->
<?php $this->layout = 'voluntarios'; ?>

<title>Asignar Habilidades</title>

		
	<div class="container">
	<form action=""></form>
		<div class="tabla">
			<div class="filaHeader">
				<div class="elementoHeader" style="width:50%">Mision</div>
				<div class="elementoHeader" style="width:50%">Grado de Dominio</div>
			</div>
			<!--Se crearan filas cada vez-->
			<div class="fila">
				<!--Estos elementos tendran ComboBox con las habilidades -->
				<div class="elemento" style="width:50%">
					<input type="checkbox" class="">Skill 1
				</div>
				<!--Estos elementos tendran inputs number's para dar el grado de dominio-->
				<div class="elemento" style="width:50%">
					<input type="number" min="1" max="5">
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>