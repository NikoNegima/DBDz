<!-- File: src/Template/Managers/index.ctp -->
<?php $this->layout = 'encargados'; ?>

<title>Home voluntario</title>


<div class="container">
		<div class="main-row">
			<div class="col-md-12">
				<!--Tabla index del ejecutor-->
				<div class="tabla" style="overflow-y:scroll">
					<div class="filaheader">
						<div class="elementoHeader" style="width:33%">Emergencia</div>
						<div class="elementoHeader" style="width:33%">Mision</div>
						<div class="elementoHeader" style="width:33%">Estado</div>
					</div>

					<div class="fila">
						 <?php foreach ($manager_missions as $dato): ?> 
							<div class="elemento" style="width:33%"><?php echo $dato['name']; ?></div>
							<div class="elemento" style="width:33%"><?php echo $dato['mission_name']; ?></div>
							<div class="elemento" style="width:33%"><?php echo $dato['status']; ?></div>
						<?php endforeach; ?> 

					</div> 
				</div>
			</div>
		</div>
	</div>
	
	

</body>
</html>