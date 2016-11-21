<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      require 'connMySQL.php';

      $matricula = $_SESSION['sess_username'];

      $shw_correo = $_POST['shwMail'];
      $shw_cel = $_POST['shwCel'];

      $leng1 = $_POST['leng1']
      $leng1_prc = $_POST['leng1Prc'];
      $leng2 = $_POST['leng2']
      $leng2_prc = $_POST['leng2Prc'];
      $leng3 = $_POST['leng3'];
      $leng3_prc = $_POST['leng3Prc'];
      $leng4 = $_POST['leng4']
      $leng4_prc = $_POST['leng4Prc'];
      $leng5 = $_POST['leng5']
      $leng5_prc = $_POST['leng5Prc'];

      $exp1 = $_POST['exp1'];
      $exp1_det = $_POST['exp1_det'];
      $exp2 = $_POST['exp2'];
      $exp2_det = $_POST['exp2_det'];
      $exp3 = $_POST['exp3'];
      $exp3_det = $_POST['exp3_det'];
      $exp4 = $_POST['exp4'];
      $exp4_det = $_POST['exp4_det'];
      $exp5 = $_POST['exp5'];
      $exp5_det = $_POST['exp5_det'];

      $edu1 = $_POST['edu1'];
      $edu1_det = $_POST['edu1_det'];
      $edu2 = $_POST['edu2'];
      $edu2_det = $_POST['edu2_det'];
      $edu3 = $_POST['edu3'];
      $edu3_det = $_POST['edu3_det'];
      $edu4 = $_POST['edu4'];
      $edu4_det = $_POST['edu4_det'];
      $edu5 = $_POST['edu5'];
      $edu5_det = $_POST['edu5_det'];

      $sql = "INSERT INTO perfil(matricula, prog_carr, leng1, leng1_prc, exp1, exp1_det, edu1, edu1_det, leng2, leng2_prc, exp2, exp2_det, edu2, edu2_det, leng3, leng3_prc, exp3, exp3_det, edu3, edu3_det, leng4, leng4_prc, exp4, exp4_det, edu4, edu4_det, leng5, leng5_prc, exp5, exp5_det,  edu5, edu5_det)
      VALUES ('$matricula', '$prog_carr', '$leng1', '$leng1_prc', '$exp1', '$exp1_det', '$edu1', '$edu1_det',
      '$leng2', '$leng2_prc', '$exp2', '$exp2_det',
      '$edu2', '$edu2_det', '$leng3', '$leng3_prc',
      '$exp3', '$exp3_det', '$edu3', '$edu3_det',
      '$leng4', '$leng4_prc', '$exp4', '$exp4_det',
      '$edu4', '$edu4_det', '$leng5', '$leng5_prc',
      '$exp5', '$exp5_det',  '$edu5', '$edu5_det')";

      if ($conn->query($sql) === TRUE) {
        echo "Cambios guardados con exito!
              <br>
              Redireccionando en 3 segundos.";
              header("refresh:3;url=perfil_alumno.php");
      } else {
        echo "Error: ".$sql."<br>".$conn->error;
      }

    ?>
  </body>
</html>
