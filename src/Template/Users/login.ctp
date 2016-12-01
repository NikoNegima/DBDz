<!-- File: src/Template/Users/login.ctp -->
<?php // $this->layout = '' ?>

<?= $this->Flash->render('auth') ?>
	<header>
		<div class="container">
			<div class="jumbotron">
				<h1>Login - Sistema de Voluntarios</h1>
			</div>
		</div>
	</header>
	<br>
	<br>

	<div class="container">

	<?php
		echo $this->Form->create(NULL, ['class' => 'form-horizontal']);
	?>
		<form action="" class="form-horizontal">
			<!-- Nombre del usuario -->
			<div class="form-group">
				<label for="user" class="control-label col-md-2">Usuario</label>
				<div class="col-md-10">
					<input type="text" name="username" id="user" class="form-control" placeholder="Ingrese su usuario:">
				</div>
			</div>

			<!-- Pass -->
			<div class="form-group">
				<label for="pw" class="control-label col-md-2">Password</label>
				<div class="col-md-10">
					<input type="password" name="password" id="pw" class="form-control" placeholder="Ingrese su password:">
				</div>
			</div>

			<!-- Combobox: Tipo de usuario-->
			<div class="form-group">
				<label for="region" class="control-label col-md-2">Tipo de Usuario:</label>
				<div class="col-md-10 combobox">
					<select name="attribute" class="form-control" id="region">
						<option value="V">Voluntario</option>
						<option value="M">Encargado</option>
						<option value="A">Administrador</option>						
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="pull-left col-md-offset-2">
					<?php 
					echo $this->Html->link('Registrar', ['controller'=>'Users','action'=>'register'],['class' => 'btn btn-primary']);
					?>
				</div>
				<div class="pull-right">
					<!--<button id="ingresar" class="btn btn-primary">Ingresar</button>-->
					<?php
						echo $this->Form->button('Ingresar', ['type' => 'submit', 'class' => 'btn btn-primary']);
						echo $this->Form->end();
					?>
				</div>
			</div>
		</form>
	</div>


</body>
</html> 	
