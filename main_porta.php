<?php session_start(); ?>

<?php

	$matricula = $_SESSION['sess_username'];

	require 'connMySQL.php';

	$user_name = mysqli_query($conn, "SELECT ap, am, nombre FROM estudiante WHERE matricula = $matricula");

	$row_user = $user_name->fetch_assoc();
	$nombre = $row_user['nombre']." ".$row_user['ap']." ".$row_user['am'];

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>UNIDEP | Plataforma </title>

		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" >
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="css/barra_der.css">
		<link rel="stylesheet" href="css/barra_sup.css">
		<link rel="stylesheet" href="css/barra_izq.css">
		<link rel="stylesheet" href="css/fonts.css">
		<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<header>
		<!--BARRA SUPERIOR -->
		<div class="wrapper">
			<div class="logo">
				<!--<UNIDEP>-->
				<img src="img/logo2.png" alt="logo">
			</div>
			<nav>
				<span class="icon-user"><?php echo $nombre; ?></span>
				<a href="#">Cerrar Sesion</a>
			</nav>
		</div>
		</header>
		<!--BARRA DERECHA -->
		<div class="bar-der">
			<ul>
				<li><a href="#" class="icon-book"> </a></li>
				<li><a href="#" class="icon-home"> </a></li>
				<li><a href="#" class="icon-magnifying-glass"> </a></li>
				<li><a href="#" class="icon-mail"> </a></li>
			</ul>
		</div>
		<!--BARRA IZQUIERDA -->
		<div class="bar_izq">
			<ul>
				<li><a href="#"><span class="icon-v-card"></span> Perfil</a></li>
				<li><a href="#"><span class="icon-open-book"></span> Clases</a></li>
				<li><a href="mail.php +"><span class="icon-mail"></span> Correo</a></li>
				<li><a href="#"><span class="icon-paper-plane"></span> External Links</a></li>
			</ul>
		</div>


		<section class="contenido wrapper">

			<h1>Bienvenidos al creador de portafolio</h1>



			<textarea>Easy (and free!) You should check out our premium features.</textarea>

		<footer class="footer">
	    <div class="contenedor">
	      <div class="social">
	        <a href="#" class="icon-facebook"></a>
	        <a href="#" class="icon-twitter"></a>
	        <a href="#" class="icon-google"></a>
	      </div>
	      <p class="copy">&copy; UNIDEP - Universidad de Desarrollo Profesional </p>
	    </div>
	  </footer>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>

	</body>
</html>
