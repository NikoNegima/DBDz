<!-- File: src/Template/Managers/index.ctp -->
<?php $this->layout = 'voluntario'; ?>

<title>Ver Mensajes - Voluntario</title>


<div class="container">
		<div class="main-row">
			<?php //foreach ($var as $dato): ?> 
			<div class="row col-md-12">
			<!--Vista ver usuario-->	

				<div class="col-md-6">
					<label for="" class="control-label">Enviado por:</label>
					<p><?php //echo $dato['a']; ?></p>
				</div>
				<div class="col-md-6">
					<label for="" class="control-label">Urgencia: </label>
					<p><?php //echo $dato['b']; ?></p>
				</div>
				<br><br>
				<div class="col-md-12">
					<label for="" class="control-label">Mensaje:</label>
					<p><?php //echo $dato['c'] ?></p>
				</div>
			</div>
			<?php //endforeach; ?> 
		</div>
	</div>
	
	

</body>
</html>