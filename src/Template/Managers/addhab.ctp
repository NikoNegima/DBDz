<!-- File: src/Template/Admins/addhab.ctp -->
<?php $this->layout = 'encargados'; 
use Cake\ORM\TableRegistry;?>
	
<title>Añadir Habilidad</title>

	<div class="container">

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Definir Habilidades</h3></div></div></div></div><div class="row">


    <?php 
    	echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
    ?>

		<div class="row">
			<div class="text-center">
				<select name="habilidad" id="">
					<!-- <option value="N">NO ASIGNAR</option>-->
					<?php foreach ($hab as $skill): ?>
	                    <option value=<?php echo $skill->id;?>> <?php echo $skill->skill_name;?> </option>  
	                <?php endforeach; ?>
                </select>
			</div>
		</div>


		<div class="row">
			<div class="text-center">
			
			<br>
           	<?php
            	echo $this->Form->button('Añadir', ['type' => 'submit', 'class' => 'btn btn-primary']);
        	?>
		    </div>
		    <br>
		
        </div>

        	
		<div class="row">  	

	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:33%">Nombre Habilidad</div>
							<div class="elementoHeader" style="width:33%">Id Habilidad</div>
							<div class="elementoHeader" style="width:34%">Emergencia</div>
						</div>
						<div class="fila">
							<?php 
								$query = TableRegistry::get('EmergenciesneedSkills')->find();
								foreach ($query as $q): ?>									

									<?php
										//necesito nombre habilidad, id habilidad, id emergencia
										$eme = $q->emergency_id;

										$query2 = TableRegistry::get('Skills')->find();
										$h = $query2->where(['id' => $q->skill_id])->first();
										$hnombre = $h->skill_name;

										if($eme == $id_actual): ?>
											<div class="elemento" style="width:33%"><?php echo $hnombre;?></div>
											<div class="elemento" style="width:33%"><?php echo $q->skill_id;?></div>
											<div class="elemento" style="width:34%"><?php echo $id_actual;?></div>
										<?php endif; ?>

								<?php endforeach; ?>
						</div>
																						
					</div>
				</div>
				<br>
	    </div>

	    <div class="row">
			<div class="text-center">
		        <button type="button" onclick="location.href='/Managers/index'" class="btn btn-primary"">Terminar</button>
		    </div>
		</div>

    <?php
        echo $this->Form->end();
    ?>

</div>
</body>
</html>