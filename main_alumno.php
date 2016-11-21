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

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
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
				<li><a href="perfil_alumno.php"><span class="icon-v-card"></span> Perfil</a></li>
				<li><a href="#"><span class="icon-open-book"></span> Clases</a></li>
				<li><a href="#"><span class="icon-mail"></span> Correo</a></li>
				<li><a href="#"><span class="icon-paper-plane"></span> External Links</a></li>
				<li><a href="main_porta.php"><span class="icon-mail"></span> Portafolio</a></li>
			</ul>
		</div>


		<section class="contenido wrapper">

			<h1>Bienvenidos al portal UNIDEP</h1>

			<!--Obtener la carrera en la que esta inscrito el estudiante-->
			<?php
			require 'connMySQL.php';

			$result = mysqli_query($conn, "SELECT nom_car FROM carrera WHERE clve_car = (SELECT clve_car FROM estudiante WHERE matricula = $matricula)");

			$row = $result->fetch_assoc();

			echo $row['nom_car'];
		  ?>

			<?php
				require 'connMySQL.php';

		    $result = mysqli_query($conn, "SELECT grado FROM record_estudiante WHERE matricula = $matricula");

		    while ($row = mysqli_fetch_array($result)) {
		      echo "<div class='panel panel-primary'>
		              <div class='panel-heading'>
		                <h3 class='panel-title'>".$row['grado']." "."Cuatrimestre"."</h3>
		              </div>";

	        $grado = $row['grado'];

					echo "<ul>";

					for ($c=1; $c < 7; $c++) {
	          $materia = mysqli_query($conn, "SELECT nom_mat FROM clases WHERE clve_clase = (SELECT clase$c FROM record_estudiante WHERE matricula = $matricula AND grado = $grado)");

	          $row_a = mysqli_fetch_array($materia);

	          echo "<li> - ".$row_a['nom_mat']." - </li>";
	        }
					echo "</ul></div>";
		  	}
	    ?>
		</section>

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

	</body>
</html>
