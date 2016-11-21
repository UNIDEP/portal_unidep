<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>

    <title>W3.CSS Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <style>html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}</style>
  </head>
  <body class="w3-light-grey">

    <?php
      $matricula = $_SESSION['sess_username'];

      require 'connMySQL.php';

      $infAlumno = mysqli_query($conn, "SELECT ap, am, nombre, f_nac, edad, correo, cel, campus, carrera FROM estudiante WHERE matricula = $matricula");

      $rowInfoA = $infAlumno->fetch_assoc();
     ?>
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

      <!-- The Grid -->
      <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

          <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
              <img src="/w3images/avatar_hat.jpg" style="width:100%" alt="Avatar">
              <div class="w3-display-bottomleft w3-container w3-text-black">
                <h2><?php echo $rowInfoA['nombre']." ".$rowInfoA['ap']." ".$rowInfoA['am']; ?></h2>
              </div>
            </div>
            <div class="w3-container">
              <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>
                <?php
                  require 'connMySQL.php';

                  $clveCar = $rowInfoA['carrera'];

                  $nomCar = mysqli_query($conn, "SELECT nom_car FROM carrera WHERE clve_car = '$clveCar'");

                  $rowCar = mysqli_fetch_array($nomCar);

                  echo $rowCar['nom_car'];
                 ?>
              </p>
              <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $rowInfoA['campus']; ?></p>
              <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $rowInfoA['correo']; ?></p>
              <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $rowInfoA['cel']; ?></p>
              <p>
                <a href="modificarPerfil.php">Editar Contacto</a>
              </p>
              <hr>

              <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
              <p>Adobe Photoshop</p>
              <div class="w3-progress-container w3-round-xlarge w3-small">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:90%">
                  <div class="w3-center w3-text-white">90%</div>
                </div>
              </div>
              <p>Photography</p>
              <div class="w3-progress-container w3-round-xlarge w3-small">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:80%">
                  <div class="w3-center w3-text-white">80%</div>
                </div>
              </div>
              <p>Illustrator</p>
              <div class="w3-progress-container w3-round-xlarge w3-small">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:75%">
                  <div class="w3-center w3-text-white">75%</div>
                </div>
              </div>
              <p>Media</p>
              <div class="w3-progress-container w3-round-xlarge w3-small">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:50%">
                  <div class="w3-center w3-text-white">50%</div>
                </div>
              </div>
              <p>
                <a href="#">Editar habiliades</a>
              </p>
              <br>

              <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Lenguajes</b></p>
              <p>English</p>
              <div class="w3-progress-container w3-round-xlarge">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:100%"></div>
              </div>
              <p>Spanish</p>
              <div class="w3-progress-container w3-round-xlarge">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:55%"></div>
              </div>
              <p>German</p>
              <div class="w3-progress-container w3-round-xlarge">
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:25%"></div>
              </div>
              <br>
            </div>
            <p>
              <a href="#">Editar idiomas</a>
            </p>
          </div><br>

        <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">

          <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Front End Developer / w3schools.com</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
              <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
              <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
            </div>
            <p>
              <a href="#">Editar experiencias</a>
            </p>
          </div>

          <div class="w3-container w3-card-2 w3-white">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
              <p>Web Development! All I need to know in one place</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>London Business School</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
              <p>Master Degree</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>School of Coding</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
              <p>Bachelor Degree</p><br>
            </div>
            <p>
              <a href="#">Editar educación</a>
            </p>
          </div>

        <!-- End Right Column -->
        </div>

      <!-- End Grid -->
      </div>

      <!-- End Page Container -->
    </div>

    <footer class="w3-container w3-teal w3-center w3-margin-top">
      <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

  </body>
</html>
