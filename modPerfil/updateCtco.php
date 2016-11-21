<?php session_start(); ?>
<?php

  require '../connMySQL.php';

  $matricula = $_SESSION['sess_username'];

  $shw_correo = $_POST['shwMail'];
  $shw_cel = $_POST['shwCel'];

  $sql = "UPDATE perfil
            SET shw_correo = '$shw_correo', shw_cel = '$shw_cel'
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
