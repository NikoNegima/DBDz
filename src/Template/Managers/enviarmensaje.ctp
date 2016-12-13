<!-- File: src/Template/Managers/enviarMensaje.ctp -->
<?php $this->layout = 'encargados'; ?>



	<div class="container">
			<?php 
                echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
            ?>
			<div class="form-group">
					<!-- Combobox: Encargados-->
					<label for="encarg" class="control-label col-md-4">Seleccione el voluntario a enviar el mensaje:</label>
					<div class="col-md-4">
						<select name="voluntario" class="form-control" id="region">
							<?php foreach ($volunteers as $volunteer): ?>
								<?php $fullname = $volunteer->name . " " . $volunteer->last_name_first;;?>
								<option value=<?php echo $volunteer->id;?>><?php echo $fullname;?></option>
							<?php endforeach; ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="encarg" class="control-label col-md-4">Seleccione la urgencia del mensaje:</label>
					<div class="col-md-4">
						<select name="gravedad" class="form-control">
							<option value="1">Baja</option>
							<option value="2">Media</option>
							<option value="3">Urgente</option>
						</select>
					</div>
				
			</div>
			<div class="form-group">
				<div class="container text-center">
					<label for="" class="control-label">Ingrese su mensaje:</label>

					<div class="container " >
						<textarea name="msj" class="form-control" style="resize:none;width:90%;margin-left:50px;" rows="10" id="comment" placeholder="¿Qué Sucede? "></textarea>
					</div>

				</div>
			</div>	
			<div class="form-group">
				<button class="btn btn-primary pull-left">Atrás</button>
				<!--<button class="btn btn-primary pull-right">Enviar</button>-->
				<?php
					echo $this->Form->button('Enviar', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']);
					echo $this->Form->end();
				?>
			</div>
	</div>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>