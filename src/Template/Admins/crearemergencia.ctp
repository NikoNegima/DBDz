<!-- File: src/Template/Admins/crearemergencia	.ctp -->
<?php $this->layout = 'administradores'; ?>

<title>Crear Emergencia</title>

<div class="container">


            <div class="section"><div class="container"><div class="row"><div class="col-md-12"><h3>Datos de la Emergencia</h3></div></div></div></div><div class="row">

            <section class="main-row">
            <?php 
                echo $this->Form->create(NULL, ['class' => 'form-horizontal']); 
            ?>
            <!-- Combobox: REGION-->
            <div class="form-group">
                <label for="region" class="control-label col-md-3 ">Region:  </label>
                <div class="col-md-6 col-md-offset combobox" style="overflow-x: visible;">
                    <select name="region" class="form-control" id="region">
                        <option value="1">I REGION</option>
                        <option value="2">II REGION</option>
                        <option value="3">III REGION</option>
                        <option value="4">IV REGION</option> 
                        <option value="5">V REGION</option> 
                        <option value="6">VI REGION</option>
                        <option value="7">VII REGION</option> 
                        <option value="8">VIII REGION</option> 
                        <option value="9">IX REGION</option>
                        <option value="10">X REGION</option>
                        <option value="11">XI REGION</option> 
                        <option value="12">XII REGION</option> 
                        <option value="13">METROPOLITANA</option>
                        <option value="14">XIV REGION</option> 
                        <option value="15">XV REGION</option>                          
                    </select>
                </div>
            </div>

            <!-- Combobox: COMUNAS-->
            <div class="form-group">
                <label for="comuna" class="control-label col-md-3 ">Comuna:  </label>
                <div class="col-md-6 col-md-offset combobox" style="overflow-x: visible;">
                    <select name="comuna" class="form-control" id="region">
                        <?php foreach ($communes as $commune): ?>
                            <option value=<?php echo $commune->id;?>><?php echo $commune->name;?></option>  
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- gravedad de la emergencia -->
            <div class="form-group">
                <label for="region" class="control-label col-md-3 ">Gravedad:  </label>
                <div class="col-md-6 col-md-offset combobox" style="overflow-x: visible;">
                    <select name="gravedad" class="form-control" id="region">
                        <option value="L">Leve</option>
                        <option value="M">Medio</option>
                        <option value="G">Grave</option>                         
                    </select>
                </div>
            </div>

            <!-- Nombre de la emergencia -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Nombre de la Emergencia: </label>
                <div class="col-md-6">
                    <input type="text" name="nombreemergencia" class="form-control" placeholder="Ingrese Nombre de la Emergencia">
                </div>
            </div>

            <!-- Fecha de la emergencia -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Fecha de la Emergencia: </label>
                <div class="col-md-3">
                    <input type="text" name="fechaemergencia" class="form-control" placeholder="AAAA/MM/DD">
                </div>
            </div>

            <!-- lugar de la emergencia -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Lugar de la Emergencia: </label>
                <div class="col-md-3">
                    <input type="text" name="lugaremergencia" class="form-control" placeholder="Nombre Lugar">
                </div>
            </div>

            <!-- Detalles de la emergencia -->
            <div class="form-group">
                <label for="user" class="control-label col-md-3">Descripción: </label>
                <div class="col-md-9">
                    <textarea type="text" rows="6" name="descemergencia" class="form-control"></textarea>
                </div>
            </div>
         
            </section>
            <div class="pull-right">
            <?php
                echo $this->Form->button('CREAR', ['type' => 'submit', 'class' => 'btn btn-primary']);
                echo $this->Form->end();
            ?>

</div>
</body>
</html>