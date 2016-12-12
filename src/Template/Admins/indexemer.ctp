<!-- File: src/Template/Admins/indexemer.ctp -->
<?php $this->layout = 'administradores'; 
use Cake\ORM\TableRegistry;?>

<title>Listado Emergencias</title>

<div class="container">

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Emergencias Definidas</h3></div></div></div></div><div class="row">

        <?php 
            echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
        ?>

		<div class="row">  	
	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:33%">ID Emergencia</div>
							<div class="elementoHeader" style="width:33%">Estado Emergencia</div>
							<div class="elementoHeader" style="width:34%">Cambiar Estado</div>
						</div>
						<div class="fila">

						<!--
							<?php // foreach ($missions as $mission): ?>
								<?php
								/*
								$session = $this->request->session();
								$id_actual = $session->read('eme_id');
								$id_encargado = $mission->manager_id;
								$query = TableRegistry::get('Managers')->find();
								$encargado = $query->where(['id' => $id_encargado])->first();
								$nombre_encargado = $encargado['name'] . " " . $encargado['last_name_first'];

								if ($id_actual == $mission->emergency_id): */?>
									<div class="elemento" style="width:33%"><?php //echo $mission->mission_name;?></div>
									<div class="elemento" style="width:33%"><?php //echo $mission->id;?></div>
									<div class="elemento" style="width:34%"><?php //echo $nombre_encargado;?></div>
								<?php //endif; ?>
							<?php //endforeach; ?>
						-->

						<?php foreach ($emergencies as $emergency): ?>
							<?php
							$id_admin_emergencia = $emergency['admin_id'];

							$session = $this->request->session();
							$admin_id_actual = $session->read('id');

							$id_emer = $emergency['id'];

							if($id_admin_emergencia == $admin_id_actual): ?>
								<div class="elemento" style="width:33%"><?php echo $emergency['id'];?></div>
								<div class="elemento" style="width:33%"><?php echo $emergency['status'];?></div>
								<div class="elemento" style="width:34%"> 
									<?php echo '<select name="combobox'. $id_emer .'" id="">';?>
                						<option value="En Progreso">En Progreso</option>
                						<option value="Cancelada">Cancelada</option>
                						<option value="Finalizada">Finalizada</option>
                					</select>
								 </div>
							<?php endif; ?>
						<?php endforeach; ?>

						</div>										
					</div>
				</div>
				<br>
	    </div>

	    <div class="pull-right">
        <?php
        	echo $this->Form->button('Enviar', ['type' => 'submit', 'class' => 'btn btn-primary']);
        ?>
        </div>
        <?php
        	echo $this->Form->end();
        ?>
</div>

</body>
</html>