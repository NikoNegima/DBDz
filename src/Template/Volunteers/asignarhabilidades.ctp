<!-- File: src/Template/Volunteers/asignarhabilidades.ctp -->
<?php $this->layout = 'voluntarios'; 
use Cake\ORM\TableRegistry;?>

<title>Asignar Habilidades</title>

		
<div class="container">

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Definir Habilidades</h3></div></div></div></div><div class="row">


    <?php 
    	echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
    ?>

		<div class="row">
			<div class="col-md-2 col-md-offset-3">
				<select name="habilidad" id="">
				<!-- <option value="N">NO ASIGNAR</option>-->
				<?php foreach ($skills as $skill): ?>
                    <option value=<?php echo $skill->id;?>><?php echo $skill->skill_name;?></option>  
                <?php endforeach; ?>
                </select>
			</div>

			<div class = "col-md-3">
				<input type="number" name="dominio" class="form-control" placeholder="Ingrese grado de dominio">
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

        <br>

		<div class="row">  	
	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:33%">Nombre Habilidad</div>
							<div class="elementoHeader" style="width:33%">Id Habilidad</div>
							<div class="elementoHeader" style="width:34%">Grado de Dominio</div>
						</div>
						<div class="fila">
							<?php 
								$query = TableRegistry::get('SkillsVolunteers')->find();
							foreach ($query as $q): ?>
								<!--<div class="elemento" style="width:33%">1</div>
								<div class="elemento" style="width:33%">2</div>
								<div class="elemento" style="width:34%">3</div>-->
								<?php

         							$id_voluntario = $user_id;
         							$id_volunteer = $q->volunteer_id;

         							$query2 = TableRegistry::get('Skills')->find();
									$h = $query2->where(['id' => $q->skill_id])->first();

									if($id_voluntario == $id_volunteer): ?>
										<div class="elemento" style="width:33%"><?php echo $h['skill_name'];?></div>
										<div class="elemento" style="width:33%"><?php  echo $h['id'];?></div>
										<div class="elemento" style="width:34%"><?php  echo $q['domain_degree']; ?></div>
									<?php endif; ?>
							<?php endforeach; ?>
						</div>
																						
					</div>
				</div>
				<br>
	    </div>

	    <div class="row">
			<div class="text-center">
		        		<button type="button" onclick="location.href='/Volunteers/index'" class="btn btn-primary"">Terminar</button>
		    </div>
		</div>

    <?php
        echo $this->Form->end();
    ?>

</div>
</body>
</html>