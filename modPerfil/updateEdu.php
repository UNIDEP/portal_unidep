<?php session_start(); ?>
<?php

  require '../connMySQL.php';

  $matricula = $_SESSION['sess_username'];

  $edu1 = $_POST['edu1'];
  $edu1_ini = $_POST['edu1F_Ini'];
  $edu1_fin = $_POST['edu1F_Fin'];
  $edu1_det = $_POST['edu1Det'];

  $edu2 = $_POST['edu2'];
  $edu2_ini = $_POST['edu2F_Ini'];
  $edu2_fin = $_POST['edu2F_Fin'];
  $edu2_det = $_POST['edu2Det'];

  $edu3 = $_POST['edu3'];
  $edu3_ini = $_POST['edu3F_Ini'];
  $edu3_fin = $_POST['edu3F_Fin'];
  $edu3_det = $_POST['edu3Det'];

  $edu4 = $_POST['edu4'];
  $edu4_ini = $_POST['edu4F_Ini'];
  $edu4_fin = $_POST['edu4F_Fin'];
  $edu4_det = $_POST['edu4Det'];

  $sql = "UPDATE perfil
            SET edu1 = '$edu1', edu1_ini = '$edu1_ini', edu1_fin = '$edu1_fin', edu1_det = '$edu1_det', edu2 = '$edu2', edu2_ini = '$edu2_ini', edu2_fin = '$edu2_fin', edu2_det = '$edu2_det', edu3 = '$edu3', edu3_ini = '$edu3_ini', edu3_fin = '$edu3_fin', edu3_det = '$edu3_det', edu4 = '$edu4', edu4_ini = '$edu4_ini', edu4_fin = '$edu4_fin', edu4_det = '$edu4_det'
              WHERE matricula = '$matricula'";

  if ($conn->query($sql) === TRUE) {
    header("refresh:0;url=../perfil_alumno.php");
  } else {
    echo "Error: ".$sql."<br>".$conn->error;
  }

?>
