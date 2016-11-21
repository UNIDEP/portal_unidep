<?php

  require 'connMySQL.php';

  $infAlumno = mysqli_query($conn, "SELECT ap, am, nombre, f_nac, edad, correo, cel, campus, carrera FROM estudiante WHERE matricula = 12345678");

  $rowInfoA = $infAlumno->fetch_assoc();

 ?>
<?php
  require 'connMySQL.php';

  echo $rowInfoA['carrera'];



  $clveCar = $rowInfoA['carrera'];

  echo $clveCar;

$queryCarrera = mysqli_query($conn,"SELECT nom_car FROM carrera WHERE clve_car = '$clveCar'");

  $nombreCar = mysqli_fetch_array($queryCarrera);

  echo $nombreCar['nom_car'];
 ?>
