<?php session_start(); ?>
<?php

  require '../connMySQL.php';

  $matricula = $_SESSION['sess_username'];

  $exp1 = $_POST['exp1'];
  $exp1_ini = $_POST['exp1F_Ini'];
  $exp1_fin = $_POST['exp1F_Fin'];
  $exp1_det = $_POST['exp1Det'];

  $exp2 = $_POST['exp2'];
  $exp2_ini = $_POST['exp2F_Ini'];
  $exp2_fin = $_POST['exp2F_Fin'];
  $exp2_det = $_POST['exp2Det'];

  $exp3 = $_POST['exp3'];
  $exp3_ini = $_POST['exp3F_Ini'];
  $exp3_fin = $_POST['exp3F_Fin'];
  $exp3_det = $_POST['exp3Det'];

  $exp4 = $_POST['exp4'];
  $exp4_ini = $_POST['exp4F_Ini'];
  $exp4_fin = $_POST['exp4F_Fin'];
  $exp4_det = $_POST['exp4Det'];

  $sql = "UPDATE perfil
            SET exp1 = '$exp1', exp1_ini = '$exp1_ini', exp1_fin = '$exp1_fin', exp1_det = '$exp1_det', exp2 = '$exp2', exp2_ini = '$exp2_ini', exp2_fin = '$exp2_fin', exp2_det = '$exp2_det', exp3 = '$exp3', exp3_ini = '$exp3_ini', exp3_fin = '$exp3_fin', exp3_det = '$exp3_det', exp4 = '$exp4', exp4_ini = '$exp4_ini', exp4_fin = '$exp4_fin', exp4_det = '$exp4_det'
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
