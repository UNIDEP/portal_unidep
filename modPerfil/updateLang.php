<?php session_start(); ?>
<?php
  require '../connMySQL.php';

  $matricula = $_SESSION['sess_username'];

  $leng1 = $_POST['leng1'];
  $leng1Prc = $_POST['leng1_lvl'];
  $leng2 = $_POST['leng2'];
  $leng2Prc = $_POST['leng2_lvl'];
  $leng3 = $_POST['leng3'];
  $leng3Prc = $_POST['leng3_lvl'];
  $leng4 = $_POST['leng4'];
  $leng4Prc = $_POST['leng4_lvl'];
  $leng5 = $_POST['leng5'];
  $leng5 = $_POST['leng5_lvl'];

  $sql = "UPDATE perfil
            SET leng1 = '$leng1', leng1_prc = '$leng1Prc', leng2 = '$leng2', leng2_prc = '$leng2Prc', leng1 = '$leng3', leng3_prc = '$leng3Prc', leng4 = '$leng4', leng4_prc = '$leng4Prc', leng5 = '$leng5', leng5_prc = '$leng5Prc'
              WHERE matricula = '$matricula'";

  if ($conn->query($sql) === TRUE) {
    echo "Registrado Correctamente!";
    echo "<br>";
    echo "Redireccionando en 3 segundos.";
    header("refresh:0;url=../perfil_alumno.php");
  } else {
    echo "Error: ".$sql."<br>".$conn->error;
  }
?>
