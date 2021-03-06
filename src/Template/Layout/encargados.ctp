<!DOCTYPE html>
<html>
<head>
	<title>Encargado</title>
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
        <li class=""><a href="/Managers/"><font size="2">Home </font><span class="sr-only">(current)</span></a></li>
        <li><a class="" href="/Managers/addhab"><font size="1">Añadir habilidad</font></a></li>
        <li><a class="" href="/Managers/definirvoluntario"><font size="1">Designar Voluntarios a Tareas</font></a></li>
         <li><a class="" href="/Managers/def_task"><font size="1">Crear Tareas</a></font></li>
		    <li><a class="" href="/Managers/gestionarestados"><font size="1">Gestionar Estados</font></a></li>
        <li><a class="" href="/Managers/gestionarsolicitudes"><font size="1">Gestionar Solicitudes</font></a></li>
        <li><a class="" href="/Managers/enviarmensaje"><font size="1">Enviar Mensaje</font></a></li>
        <li><a class="" href="/Managers/vermensajese"><font size="1">Ver Mensajes</font></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text"><font size="2">Conectado como: <?= $fullname ?> </font></p></li> <!-- la variable $fullname tiene una string con el nombre del usuario -->
		<li><a href="/Users/logout"><font size="2">Cerrar sesión</font></a></li>
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