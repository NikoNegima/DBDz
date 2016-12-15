<!-- File: src/Template/Volunteers/index.ctp -->
<?php $this->layout = 'voluntarios'; ?>

<title>Home voluntario</title>

<div class="container">

		<div class="main-row">
		
			<form action="">
				<div class="col-md-6 text-center">
					<label for="" class="control-label">Disponibilidad: </label>
					<!-- Aqui se supone que se recibe el voluntario en la seccion,
					si la disponibilidad es 1, entonces deberia estar checkeado. -->
					<input type="checkbox"<?php //echo ($var['disp']==1 ? 'checked' : '');?> >
				</div>
				<div class="col-md-6 text-center">
					<div class="form-inline">
						<label for="" class="control-label" style="border-right:5px;border-left:5px;">Ubicacion Actual: </label>
						<!--Aqui se pone en el texto la ubicacion_actual -->
						<input type="text" class="form-control"><?php //echo $var['ubicacion_actual'] ?>
					</div>
				</div>
			</form>
		</div>
		<br>
		<br>
		<br>
		<br>

		<hr style="border: 2px solid black">

		<br><br><br><br>
		<!--Informacion de las tareas! -->
		<?php //foreach ($var as $tarea)?>
		<div class="row">
			<div class="col-md-6 text-center">
				<label for="" class="control-label">Nombre Tarea:</label>
				<p><?php //echo $tarea['name'] ?></p>
			</div>
			<div class="col-md-6 text-center">
				<label for="" class="control-label">Estado:</label>
				<p><?php //echo $tarea['status'] ?></p>
			</div>
			<br><br>
			<div class="col-md-12 text-center">
				<label for="" class="control-label">Documento Guia:</label>
				<p><?php //echo $tarea['docguia']?></p>
			</div>
		</div>

		<?php //end foreach ?>
</div>
	
	

</body>
</html>