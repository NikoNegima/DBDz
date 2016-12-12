<!-- File: src/Template/Admins/addmision.ctp -->
<?php $this->layout = 'administradores'; 
use Cake\ORM\TableRegistry;?>

<title>Misiones Actuales</title>

<div class="container">

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Misiones Definidas</h3></div></div></div></div><div class="row">

		<div class="row">
			<div class="text-center" >
		        		<button onclick="location.href='/Admins/defmision'"  type="button" class="btn btn-primary" >Añadir</button>
		    </div>
		    <br>
		</div>

        <?php 
            echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
        ?>

		<div class="row">  	
	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:33%">Nombre Mision</div>
							<div class="elementoHeader" style="width:33%">Id Mision</div>
							<div class="elementoHeader" style="width:34%">Encargado</div>
						</div>
						<div class="fila">
							<!--<div class="elemento" style="width:33%">1</div>
							<div class="elemento" style="width:33%">2</div>
							<div class="elemento" style="width:34%">
								<select name="tarea" id="">
								<option value="N">NO ASIGNAR</option>
								<option value="1">Encargado 1</option>
								<option value="2">Encargado 2</option>
								<option value="3">Encargado 3</option>
								</select>
							</div>-->

							<?php foreach ($missions as $mission): ?>
								<?php
								$session = $this->request->session();
								$id_actual = $session->read('eme_id');
								$id_encargado = $mission->manager_id;
								$query = TableRegistry::get('Managers')->find();
								$encargado = $query->where(['id' => $id_encargado])->first();
								$nombre_encargado = $encargado['name'] . " " . $encargado['last_name_first'];

								if ($id_actual == $mission->emergency_id): ?>
									<div class="elemento" style="width:33%"><?php echo $mission->mission_name;?></div>
									<div class="elemento" style="width:33%"><?php echo $mission->id;?></div>
									<div class="elemento" style="width:34%"><?php echo $nombre_encargado;?></div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>										
					</div>
				</div>
				<br>
	    </div>

	    <div class="row">
			<div class="text-center">
		        		<button onclick="location.href='/Admins/'" type="button" class="btn btn-primary"">Terminar</button>
		    </div>
		</div>

        <?php
            echo $this->Form->end();
        ?>

</div>

</body>
</html>