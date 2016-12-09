<!-- File: src/Template/Volunteers/asignarhabilidades.ctp -->
<?php $this->layout = 'voluntarios'; ?>

<title>Asignar Habilidades</title>

		
<div class="container">
	<form action="" class="form-horizontal">
		<div class="tabla">
			<div class="filaHeader">
				<div class="elementoHeader" style="width:33.3%">Tipo de Habilidad</div>
				<div class="elementoHeader" style="width:33.3%">Nombre de Habilidad</div>
				<div class="elementoHeader" style="width:33.3%">Grado de Dominio</div>
			</div>
			<!--Se crearan filas cada vez-->
			<div class="fila">
				<?php foreach ($skills as $skill): ?>
				<!--Estos elementos tendran ComboBox con las tipo de las habilidades -->
				<div class="elemento" style="width:33.3%">
					<?php echo $skill->skill_type?>
				</div>	
				<!--Estos elementos tendran ComboBox:  nombre de las habilidas habilidades -->
				<div class="elemento" style="width:33.3%">
					<?php echo $this->Form->input($skill->skill_name, array(
                                  'type'=>'checkbox', 
                                  'name'=>'nhabilidad')); ?>
				</div>
				<!--Estos elementos tendran inputs number's para dar el grado de dominio-->
				<div class="elemento" style="width:33.3%">
					<?php echo $this->Form->input('Nivel  ', array(
												'type'=>'number',
												'max'=>'5',
												'min'=>'1',
												'name'=>'dominio'));?>

				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<br>
		<div class="pull-right">
			<button class="btn btn-primary">Guardar Habilidades</button>
		</div>
	</form>
</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>