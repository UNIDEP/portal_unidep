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

      $infPerfil = mysqli_query($conn, "SELECT shw_correo, shw_cel FROM perfil WHERE matricula = $matricula");
      $rowPerfil = $infPerfil->fetch_assoc();
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

              <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>
                <?php echo $rowInfoA['campus']; ?>
              </p>

              <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                <?php
                  if ($rowPerfil['shw_correo'] == 'S') {
                    echo $rowInfoA['correo'];
                  } else {
                    echo "Solicitar correo";
                  }
                ?>
              </p>

              <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
                <?php
                  if ($rowPerfil['shw_cel'] == 'S') {
                    echo $rowInfoA['cel'];
                  } else {
                    echo "Solicitar telefono";
                  }
                ?>
              </p>

              <p onclick="document.getElementById('id01').style.display='block'" class="w3-btn">
                Editar Contacto
              </p>

              <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                  <header class="w3-container w3-blue">
                    <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-closebtn">&times;</span>
                  </header>
                  <form class="w3-container w3-card-4" action="modPerfil/updateCtco.php" method="post" role="form">
                    <h2 class="w3-text-blue">Opciones de contacto</h2>
                    <p>
                      Para modificar su correo o telefono favor de dirigirse a servicios escolares.
                    </p>
                    <label class="w3-text-green"><b>Mostrar correo</b></label>
                    <select class="w3-input" name="shwMail">
                      <option value="S">Si</option>
                      <option value="N">No</option>
                    </select>
                    <label class="w3-text-red"><b>Telefono</b></label>
                    <select class="w3-input" name="shwCel">
                      <option value="S">Si</option>
                      <option value="N">No</option>
                    </select>
                    <button class="w3-btn w3-blue">Actualizar</button></p>
                  </form>
                </div>
              </div>
              <hr>

              <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Progeso de carrera</b></p>
              <div class="w3-progress-container w3-round-xlarge w3-small">
                <!-- width sera una variable que contendra el calculo del progreso en la carrera -->
                <div class="w3-progressbar w3-round-xlarge w3-teal" style="width:40%">
                  <div class="w3-center w3-text-white">40%</div>
                </div>
              </div>

              <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
              <?php
                require 'connMySQL.php';
                $skills = mysqli_query($conn, "SELECT hab1, hab1_prc, hab2, hab2_prc, hab3, hab3_prc, hab4, hab4_prc, hab5, hab5_prc
                                                FROM perfil
                                                  WHERE matricula = '$matricula'");

                $skillArray = $skills->fetch_assoc();

                for ($i=1; $i < 6; $i++) {
                  $skill = $skillArray['hab'.$i];
                  $skillPrc = $skillArray['hab'.$i.'_prc'];

                  if ($skill != 'NULL' and $skillPrc != 0) {
                    echo "<p>$skill</p>
                          <div class='w3-progress-container w3-round-xlarge w3-small'>
                            <div class='w3-progressbar w3-round-xlarge w3-teal' style='width:$skillPrc%'>
                              <div class='w3-center w3-text-white'>$skillPrc%</div>
                            </div>
                          </div>";
                  }
                }
              ?>
              <p onclick="document.getElementById('id02').style.display='block'" class="w3-btn">
                Editar Habilidades
              </p>

              <div id="id02" class="w3-modal">
                <div class="w3-modal-content">
                  <header class="w3-container w3-blue">
                    <span onclick="document.getElementById('id02').style.display='none'"
                    class="w3-closebtn">&times;</span>
                  </header>
                  <form class="w3-container w3-card-4" action="modPerfil/updateSkills.php" method="post" role="form">
                    <h2 class="w3-text-blue">Habilidades</h2>
                    <p>
                      Ingrese las habilidades que desea mostrar, sea <strong>HONESTO</strong>, puede ser considerardo para trabajos y/o proyectos debido a esto. Si miente el que queda mal es usted.
                    </p>
                    <p>
                      Puede mostrar máximo cinco habilidades diferentes, si son menos solo deje los campos en blanco.
                    </p>
                    <p>
                      <label class="w3-text-red"><b>1</b></label>
                      <input class="w3-input w3-border" name="h1" type="text">
                      <label class="w3-text-red"><b>Nivel de dominio</b></label>
                      <input class="w3-input w3-border" type="text" name="h1_lvl" placeholder="1-100">
                    </p>
                    <p>
                      <label class="w3-text-red"><b>2</b></label>
                      <input class="w3-input w3-border" name="h2" type="text">
                      <label class="w3-text-red"><b>Nivel de dominio</b></label>
                      <input class="w3-input w3-border" type="text" name="h2_lvl" placeholder="1-100">
                    </p>
                    <p>
                      <label class="w3-text-red"><b>3</b></label>
                      <input class="w3-input w3-border" name="h3" type="text">
                      <label class="w3-text-red"><b>Nivel de dominio</b></label>
                      <input class="w3-input w3-border" type="text" name="h3_lvl" placeholder="1-100">
                    </p>
                    <p>
                      <label class="w3-text-red"><b>4</b></label>
                      <input class="w3-input w3-border" name="h4" type="text">
                      <label class="w3-text-red"><b>Nivel de dominio</b></label>
                      <input class="w3-input w3-border" type="text" name="h4_lvl" placeholder="1-100">
                    </p>
                    <p>
                      <label class="w3-text-red"><b>5</b></label>
                      <input class="w3-input w3-border" name="h5" type="text">
                      <label class="w3-text-red"><b>Nivel de dominio</b></label>
                      <input class="w3-input w3-border" type="text" name="h5_lvl" placeholder="1-100">
                    </p>
                    <p>
                    <button class="w3-btn w3-blue">Actualizar</button></p>
                  </form>
                </div>
              </div>
              <br>

              <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Lenguajes</b></p>
              <?php
                require 'connMySQL.php';
                $lengs = mysqli_query($conn, "SELECT leng1, leng1_prc, leng2, leng2_prc, leng3, leng3_prc, leng4, leng4_prc, leng5, leng5_prc
                                                FROM perfil
                                                  WHERE matricula = '$matricula'");

                $lengsArray = $lengs->fetch_assoc();

                for ($i=1; $i < 6; $i++) {
                  $leng = $lengsArray['leng'.$i];
                  $lengPrc = $lengsArray['leng'.$i.'_prc'];

                  if ($leng != '' and $lengPrc != 0) {
                    echo "<p>$leng</p>
                          <div class='w3-progress-container w3-round-xlarge w3-small'>
                            <div class='w3-progressbar w3-round-xlarge w3-teal' style='width:$lengPrc%'>
                              <div class='w3-center w3-text-white'>$lengPrc%</div>
                            </div>
                          </div>";
                  }
                }
              ?>
              <br>
            </div>

            <p onclick="document.getElementById('id03').style.display='block'" class="w3-btn">
              Editar lenguajes
            </p>

            <div id="id03" class="w3-modal">
              <div class="w3-modal-content">
                <header class="w3-container w3-blue">
                  <span onclick="document.getElementById('id03').style.display='none'"
                  class="w3-closebtn">&times;</span>
                </header>
                <form class="w3-container w3-card-4" action="modPerfil/updateLang.php" method="post" role="form">
                  <h2 class="w3-text-blue">Lenguajes</h2>
                  <p>
                    <label class="w3-text-red"><b>Lenguaje 1</b></label>
                    <input class="w3-input w3-border" name="leng1" type="text">
                    <label class="w3-text-red"><b>Nivel de dominio</b></label>
                    <input class="w3-input w3-border" type="text" name="leng1_lvl" placeholder="1-100">
                  </p>
                  <p>
                    <label class="w3-text-red"><b>Lenguaje 2</b></label>
                    <input class="w3-input w3-border" name="leng2" type="text">
                    <label class="w3-text-red"><b>Nivel de dominio</b></label>
                    <input class="w3-input w3-border" type="text" name="leng2_lvl" placeholder="1-100">
                  </p>
                  <p>
                    <label class="w3-text-red"><b>Lenguaje 3</b></label>
                    <input class="w3-input w3-border" name="leng3" type="text">
                    <label class="w3-text-red"><b>Nivel de dominio</b></label>
                    <input class="w3-input w3-border" type="text" name="leng3_lvl" placeholder="1-100">
                  </p>
                  <p>
                    <label class="w3-text-red"><b>Lenguaje 4</b></label>
                    <input class="w3-input w3-border" name="leng4" type="text">
                    <label class="w3-text-red"><b>Nivel de dominio</b></label>
                    <input class="w3-input w3-border" type="text" name="leng4_lvl" placeholder="1-100">
                  </p>
                  <p>
                    <label class="w3-text-red"><b>Lenguaje 5</b></label>
                    <input class="w3-input w3-border" name="leng5" type="text">
                    <label class="w3-text-red"><b>Nivel de dominio</b></label>
                    <input class="w3-input w3-border" type="text" name="leng5_lvl" placeholder="1-100">
                  </p>
                  <button class="w3-btn w3-blue">Actualizar</button></p>
                </form>
              </div>
            </div>
          </div><br>

        <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">

          <!-- WORK EXPERIENCE -->

          <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
            <?php
              require 'connMySQL.php';
              $exps = mysqli_query($conn, "SELECT exp1, exp1_ini, exp1_fin, exp1_det, exp2, exp2_ini, exp2_fin, exp2_det, exp3, exp3_ini, exp3_fin, exp3_det, exp4, exp4_ini, exp4_fin, exp4_det
                                              FROM perfil
                                                WHERE matricula = '$matricula'");

              $expArray = $exps->fetch_assoc();

              for ($i=1; $i < 5; $i++) {
                $experiencia = $expArray['exp'.$i];
                $experienciaIni = $expArray['exp'.$i.'_ini'];
                $experienciaFin = $expArray['exp'.$i.'_fin'];
                $experienciaDet = $expArray['exp'.$i.'_det'];

                if ($experiencia != '' and $experienciaIni != '' and $experienciaFin != '' and $experienciaDet != '') {
                  echo "<div class='w3-container'>
                          <h5 class='w3-opacity'><b>$experiencia</b></h5>
                          <h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>$experienciaIni - <span class='w3-tag w3-teal w3-round'>$experienciaFin</span></h6>
                          <p>$experienciaDet</p>
                          <hr>
                        </div>";
                }
              }
            ?>
            <p onclick="document.getElementById('id04').style.display='block'" class="w3-btn">
              Editar experiencias
            </p>

            <div id="id04" class="w3-modal">
              <div class="w3-modal-content">
                <header class="w3-container w3-blue">
                  <span onclick="document.getElementById('id04').style.display='none'"
                  class="w3-closebtn">&times;</span>
                </header>
                <form class="w3-container w3-card-4" action="modPerfil/updateWorkExp.php" method="post" role="form">
                  <h2 class="w3-text-blue">Experiencia en trabajos y proyectos</h2>
                  <h4 class="w3-text-blue">Inlcuye tus mejores logros!</h4>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Experiencia 1</label>
                     <input class="w3-input w3-border" type="text" name="exp1">
                   </div>
                   <div class="w3-half">
                     <label>Experiencia 2</label>
                     <input class="w3-input w3-border" type="text" name="exp2">
                   </div>
                  </div>
                  <div class="w3-row-padding">
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="exp1F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="exp1F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="exp2F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="exp2F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Detalles Exp.1</label>
                     <textarea class="w3-input w3-border" name="exp1Det" rows="8" cols="40"></textarea>
                   </div>
                   <div class="w3-half">
                     <label>Detalles Exp.2</label>
                     <textarea class="w3-input w3-border" name="exp2Det" rows="8" cols="40"></textarea>
                   </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Experiencia 3</label>
                     <input class="w3-input w3-border" type="text" name="exp3">
                   </div>
                   <div class="w3-half">
                     <label>Experiencia 4</label>
                     <input class="w3-input w3-border" type="text" name="exp4">
                   </div>
                  </div>
                  <div class="w3-row-padding">
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="exp3F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="exp3F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="exp4F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="exp4F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Detalles Exp.3</label>
                     <textarea class="w3-input w3-border" name="exp3Det" rows="8" cols="40"></textarea>
                   </div>
                   <div class="w3-half">
                     <label>Detalles Exp.4</label>
                     <textarea class="w3-input w3-border" name="exp4Det" rows="8" cols="40"></textarea>
                   </div>
                  </div>
                  <button class="w3-btn w3-blue">Actualizar</button></p>
                </form>
              </div>
            </div>
          </div>

          <!-- EDUCATION -->

          <div class="w3-container w3-card-2 w3-white">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
            <?php
              require 'connMySQL.php';
              $edus = mysqli_query($conn, "SELECT edu1, edu1_ini, edu1_fin, edu1_det, edu2, edu2_ini, edu2_fin, edu2_det, edu3, edu3_ini, edu3_fin, edu3_det, edu4, edu4_ini, edu4_fin, edu4_det
                                              FROM perfil
                                                WHERE matricula = '$matricula'");

              $eduArray = $edus->fetch_assoc();

              for ($i=1; $i < 5; $i++) {
                $educacion = $eduArray['edu'.$i];
                $educacionIni = $eduArray['edu'.$i.'_ini'];
                $educacionFin = $eduArray['edu'.$i.'_fin'];
                $educacionDet = $eduArray['edu'.$i.'_det'];

                if ($educacion != '' and $educacionIni != '' and $educacionFin != '' and $educacionDet != '') {
                  echo "<div class='w3-container'>
                          <h5 class='w3-opacity'><b>$educacion</b></h5>
                          <h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>$educacionIni - <span class='w3-tag w3-teal w3-round'>$educacionFin</span></h6>
                          <p>$educacionDet</p>
                          <hr>
                        </div>";
                }
              }
            ?>

            <p onclick="document.getElementById('id05').style.display='block'" class="w3-btn">
              Editar educación
            </p>

            <div id="id05" class="w3-modal">
              <div class="w3-modal-content">
                <header class="w3-container w3-blue">
                  <span onclick="document.getElementById('id05').style.display='none'"
                  class="w3-closebtn">&times;</span>
                </header>
                <form class="w3-container w3-card-4" action="iniciosesion.php" method="post" role="form">
                  <h2 class="w3-text-blue">Educacion y certificados</h2>
                  <h4 class="w3-text-blue">Inlcuye tus mejores logros!</h4>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Educacion 1</label>
                     <input class="w3-input w3-border" type="text" name="edu1">
                   </div>
                   <div class="w3-half">
                     <label>Educacion 2</label>
                     <input class="w3-input w3-border" type="text" name="edu2">
                   </div>
                  </div>
                  <div class="w3-row-padding">
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="edu1F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="edu1F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="edu2F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="edu2F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Detalles Edu.1</label>
                     <textarea class="w3-input w3-border" name="edu1Det" rows="8" cols="40"></textarea>
                   </div>
                   <div class="w3-half">
                     <label>Detalles Edu.2</label>
                     <textarea class="w3-input w3-border" name="edu2Det" rows="8" cols="40"></textarea>
                   </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Experiencia 3</label>
                     <input class="w3-input w3-border" type="text" name="edu3">
                   </div>
                   <div class="w3-half">
                     <label>Experiencia 4</label>
                     <input class="w3-input w3-border" type="text" name="edu4">
                   </div>
                  </div>
                  <div class="w3-row-padding">
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="edu3F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="edu3F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Inicio</label>
                      <input type="text" name="edu4F_Ini" placeholder="DD/MM/AAAA">
                    </div>
                    <div class="w3-quarter">
                      <label for="">F. Finalizada</label>
                      <input type="text" name="edu4F_Fin" placeholder="DD/MM/AAAA">
                    </div>
                  </div>
                  <div class="w3-row-padding">
                   <div class="w3-half">
                     <label>Detalles Exp.3</label>
                     <textarea class="w3-input w3-border" name="edu3Det" rows="8" cols="40"></textarea>
                   </div>
                   <div class="w3-half">
                     <label>Detalles Exp.4</label>
                     <textarea class="w3-input w3-border" name="edu4Det" rows="8" cols="40"></textarea>
                   </div>
                  </div>
                  <button class="w3-btn w3-blue">Actualizar</button></p>
                </form>
              </div>
            </div>
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
