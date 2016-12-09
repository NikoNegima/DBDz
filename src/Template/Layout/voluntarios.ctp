<!DOCTYPE html>
<html>
<head>
	<title>Voluntario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SISTEMA DE EMERGENCIAS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="/Volunteers/">Home <span class="sr-only">(current)</span></a></li>
        <li><a class="" href="/Volunteers/enviarMensaje">Enviar Mensaje</a></li>
		    <li><a class="" href="/Volunteers/aceptartareas">Aceptar Tareas</a></li>
        <li><a class="" href="/Volunteers/asignarhabilidades">Asignar Habilidades</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Conectado como: <?= $fullname ?> </p></li> <!-- la variable $fullname tiene una string con el nombre del usuario -->
		<li><a href="/Users/logout">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<br>
	<br>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>