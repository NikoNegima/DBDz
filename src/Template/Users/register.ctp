<div class="register form">

<?= $this->Form->create($register); ?>
	<fieldset>
		<?= $this->Form->input('username', ['label' => 'Nombre de usuario']); ?>
		<?= $this->Form->input('password', ['label' => 'Contraseña']); ?>
		<?= $this->Form->input('rut', ['label' => 'RUT']); ?>
		<?= $this->Form->input('name', ['label' => 'Nombre']); ?>
		<?= $this->Form->input('last_name_first', ['label' => 'Apellido paterno']); ?>
		<?= $this->Form->input('last_name_second', ['label' => 'Apellido materno']); ?>
		<?= $this->Form->input('age', ['label' => 'Edad']); ?>
		<?= $this->Form->input('residency', ['label' => 'Residencia']); ?>
		<?= $this->Form->label('Region'); ?>
		<?= $this->Form->select('region', [1 => 'I', 
		2 => 'II',
		3 => 'III',
		4 => 'IV', 
		5 => 'V',
		6 => 'VI',
		7 => 'VII',
		8 => 'VIII',
		9 => 'IX',
		10 => 'X',
		11 => 'XI',
		12 => 'XII',
		13 => 'RM',
		14 => 'XIV',
		15 => 'XV']);
		?>
		<?= $this->Form->input('phone', ['label' => 'Telefono']); ?>
		<?= $this->Form->input('mail', ['label' => 'Email']); ?>
		<?= $this->Form->label('Area de desempeño'); ?>
		<?= $this->Form->select('performance_area', 
			["I REGION" => 'I', 
		"II REGION" => 'II',
		"III REGION" => 'III',
		"IV REGION" => 'IV', 
		"V REGION" => 'V',
		"VI REGION" => 'VI',
		"VII REGION" => 'VII',
		"VIII REGION" => 'VIII',
		"IX REGION" => 'IX',
		"X REGION" => 'X',
		"XI REGION" => 'XI',
		"XII REGION" => 'XII',
		"METROPOLITANA" => 'RM',
		"XIV REGION" => 'XIV',
		"XV REGION" => 'XV'])
		 ?>
		<?= $this->Form->input('actual_ubication', ['label' => 'Ubicación actual']); ?>

	</fieldset>

<?= $this->Form->button('ENVIAR'); ?>
<?= $this->Form->end(); ?>

</div>