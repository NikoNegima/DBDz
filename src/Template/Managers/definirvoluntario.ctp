<!-- File: src/Template/Volunteers/definirvoluntarios.ctp -->
<?php $this->layout = 'encargados'; ?>

<div class="container">

	<!-- Cabecera -->
	<div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Solicitar voluntarios</h3></div></div></div></div><div class="row">

	<form class="form-horizontal">

		<div class="row">  	
	            <!-- Detalles de la mision -->
	            <div style="overflow-y:scroll;max-height:500px;">
					<div class="tabla" >
						<div class="filaHeader">
							<!--Si se agregan nuevas elementos, hay que modificar el width--> 
							<div class="elementoHeader" style="width:25%">Nombre</div>
							<div class="elementoHeader" style="width:25%">Habilidad</div>
							<div class="elementoHeader" style="width:25%">Ranking</div>
							<div class="elementoHeader" style="width:25%">¿Solicitar?</div>
						</div>

																						
					</div>
				</div>
				<br>
	    </div>

	    <div class="row">
			<div class="text-center">
		        		<button type="button" class="btn btn-primary"">Terminar</button>
		    </div>
		</div>
	</form>

</div>