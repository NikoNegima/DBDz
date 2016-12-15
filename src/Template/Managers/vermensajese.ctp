<!-- File: src/Template/Managers/index.ctp -->
<?php $this->layout = 'encargados'; ?>

<title>Ver Mensajes - Encargados</title>


<div class="container">
		<div class="main-row">
			<?php foreach ($datos_mensajes as $dato): ?> 
			<div class="row col-md-12">
			<!--Vista ver usuario-->	

				<div class="col-md-6">
					<label for="" class="control-label">Enviado por:</label>
					<p><?php echo $dato['name'] . ' ' . $dato['last_name_first']; ?></p>
				</div>
				<div class="col-md-6">
					<label for="" class="control-label">Urgencia: </label>
					<p><?php echo $dato['urgency_level']; ?></p>
				</div>
				<br><br>
				<div class="col-md-12">
					<label for="" class="control-label">Mensaje:</label>
					<p><?php echo $dato['detail'] ?></p>
				</div>
			</div>
			<?php endforeach; ?> 
		</div>
	</div>
	
	

</body>
</html>