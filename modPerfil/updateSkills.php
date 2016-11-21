<?php session_start(); ?>
<?php

  require '../connMySQL.php';

  $matricula = $_SESSION['sess_username'];

  $hab1 = $_POST['h1'];
  $hab1_prc = $_POST['h1_lvl'];
  $hab2 = $_POST['h2'];
  $hab2_prc = $_POST['h2_lvl'];
  $hab3 = $_POST['h3'];
  $hab3_prc = $_POST['h3_lvl'];
  $hab4 = $_POST['h4'];
  $hab4_prc = $_POST['h4_lvl'];
  $hab5 = $_POST['h5'];
  $hab5_prc = $_POST['h5_lvl'];

  $sql = "UPDATE perfil
            SET hab1 = '$hab1', hab1_prc = '$hab1_prc', hab2 = '$hab2', hab2_prc = '$hab2_prc', hab3 = '$hab3', hab3_prc = '$hab3_prc', hab4 = '$hab4', hab4_prc = '$hab4_prc', hab5 = '$hab5', hab5_prc = '$hab5_prc'
              WHERE matricula = '$matricula'";

  if ($conn->query($sql) === TRUE) {
    header("refresh:0;url=../perfil_alumno.php");
  } else {
    echo "Error: ".$sql."<br>".$conn->error;
  }

?>
