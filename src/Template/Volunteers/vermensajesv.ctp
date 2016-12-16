<!-- File: src/Template/Managers/index.ctp -->
<?php $this->layout = 'voluntarios'; ?>

<title>Ver Mensajes - Voluntario</title>


<div class="container">
		<div class="main-row">
		<hr style="border:1px solid black">
			<?php foreach ($datos_mensajes as $dato): ?> 
			<div class="row col-md-12">
			<!--Vista ver usuario-->	

				<div class="col-md-6">
					<label for="" class="control-label">Enviado por:</label>
					<p><?php echo $dato['name'] . ' ' . $dato['last_name_first']; ?></p>
				</div>
				<div class="col-md-6">
					<label for="" class="control-label">Urgencia: </label>
					<p><?php 
					if($dato['urgency_level'] == 1){
						echo "Baja";
					} 
					elseif($dato['urgency_level'] == 2){
						echo "Media";
					}
					else{
						echo "Alta";
					}
					?></p>
				</div>
				<br><br>
				<div class="col-md-12">
					<label for="" class="control-label">Mensaje:</label>
					<p><?php echo $dato['detail'] ?></p>
				</div>
				<?php if ($dato['subject'] == "solicitud") :?>
				<div class="col-md-12 text-center">
					<?= $this->Html->link('Aceptar Solicitud', 
														['controller' => 'Volunteers', 'action' => 'aceptarea', $dato['task_related']], 
														['class' => 'btn btn-danger', 'style' => 'padding: 1px 10px', "confirm"=>'¿Está seguro de aceptar esta tarea?']); 
								?>
		        	
		        	<br><br>
				</div>
			<?php endif; ?>
				<br><br>
				<hr style="border:1px solid black">
			</div>
			<?php endforeach; ?> 
		</div>
	</div>
	
	

</body>
</html>