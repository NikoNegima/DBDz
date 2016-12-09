<!-- File: src/Template/Volunteers/enviarMensaje.ctp -->
<?php $this->layout = 'voluntarios'; ?>



	<div class="container">
		<form action="" class="form-horizontal">
			<div class="form-group">
					<!-- Combobox: Encargados-->
					<label for="encarg" class="control-label col-md-4">Seleccione el encargado a enviar el mensaje:</label>
					<div class="col-md-4">
						<select name="encargado" class="form-control" id="region">
							<?php foreach ($managers as $manager): ?> 
								<option value=<?php echo $manager->id;?>><?php echo $manager->name;?></option>
							<?php endforeach; ?>
						</select>
					</div>
			</div>
			<div class="form-group">
				<div class="container text-center">
					<label for="" class="control-label">Ingrese su mensaje:</label>

					<div class="container " >
						<textarea name="msj" class="form-control" style="resize:none;width:90%;margin-left:50px;" rows="10" id="comment" placeholder="Que Sucede? "></textarea>
					</div>

				</div>
			</div>	
			<div class="form-group">
				<button class="btn btn-primary pull-left">Atras</button>
				<button class="btn btn-primary pull-right">Enviar</button>
			</div>
		</form>
	</div>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>