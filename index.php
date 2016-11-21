<!DOCTYPE html>

<html>
  <head>

    <title>Portal | UNIDEP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/x-icon" href="img/icono.png">

  </head>
  <body>
    <!-- Navbar -->
    <ul class="w3-navbar w3-left-align nav w3-center w3-top w3-large">
      <li class="w3-hide-medium w3-hide-large w3-blue w3-opennav w3-right"><a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-bars"></i></a></li>
      <li class="w3-hide-small" style="width:25% !important"><a class="w3-hover-blue" href="#">Noticias</a></li>
      <li class="w3-hide-small" style="width:25% !important"><a class="w3-hover-blue" href="#about">Acerca</a></li>
      <li class="w3-hide-small" style="width:25% !important"><a class="w3-hover-blue" href="#contact">Contacto</a></li>
      <li class="w3-right w3-green" style="width:25% !important" onclick="document.getElementById('id01').style.display='block'" class="w3-btn"><a class="w3-btn w3-green" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar
      </a></li>
    </ul>

    <!-- LOGIN -->
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-blue">
          <span onclick="document.getElementById('id01').style.display='none'"
          class="w3-closebtn">&times;</span>
        </header>
        <form class="w3-container w3-card-4" action="iniciosesion.php" method="post" role="form">
          <h2 class="w3-text-blue">Iniciar Sesion</h2>
          <p>
          <label class="w3-text-green"><b>Usuario</b></label>
          <input class="w3-input w3-border" name="username" type="text" placeholder="usuario" required autofocus></p>
          <p>
          <label class="w3-text-red"><b>Clave</b></label>
          <input class="w3-input w3-border" name="password" type="password"  placeholder="clave" required></p>
          <p>
          <button class="w3-btn w3-blue">Conectar</button></p>
        </form>
      </div>
    </div>

    <div class="block-margin-top">
      <?php
        $errors = array(
            1=>"Invalid user name or password, Try again",
            2=>"Please login to access this area"
          );

        $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

        if ($error_id == 1) {
          echo '<p class="text-danger">'.$errors[$error_id].'</p>';
        } elseif ($error_id == 2) {
          echo '<p class="text-danger">'.$errors[$error_id].'</p>';
        }
      ?>
    </div>

    <div id="demo" class="w3-hide w3-hide-large w3-hide-medium">
      <ul class="w3-navbar w3-left-align w3-large w3-white">
        <li class="" style="width:100% !important"><a class="w3-hover-blue" href="#">Noticias</a></li>
        <li class="" style="width:100% !important"><a class="w3-hover-blue" href="#">Noticias</a></li>
        <li class="" style="width:100% !important"><a class="w3-hover-blue" href="#about">Acerca</a></li>
        <li class="" style="width:100% !important"><a class="w3-hover-blue" href="#contact">Contacto</a></li>
      </ul>
    </div>


    <!-- Content -->
    <div class="w3-content w3-container" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
      <div class="logo w3-section w3-center">
        <img src="img/unidep.png" alt="UNIDEP">
      </div>

      <style>.mySlides {display:none;}</style>

      <div class="w3-content w3-section" style="max-width:500px">
        <img class="mySlides w3-animate-top" src="img/anuncio.png" style="width:100%">
        <img class="mySlides w3-animate-bottom" src="img/anuncio2.jpg" style="width:100%">
        <img class="mySlides w3-animate-top" src="img/Anuncio3.jpg" style="width:100%">
        <img class="mySlides w3-animate-bottom" src="img/anuncio2.jpg" style="width:100%">
      </div>

      <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 2500);
        }
      </script>

      <!-- Grid -->
      <div class="w3-row">
        <div class="w3-center w3-padding-64">
          <span class="w3-xlarge w3-bottombar w3-border-grey w3-padding-16">Ofrecemos a</span>
        </div>
        <div class="w3-col l4 m12 w3-blue w3-padding-large">
          <h3>Alumnos</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>

        <div class="w3-col l4 m12 w3-green w3-padding-large">
          <h3>Maestros</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>

        <div class="w3-col l4 m12 w3-red w3-padding-large">
          <h3>Administrativos</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>
      </div>

      <!-- Grid -->
      <div class="w3-row-padding" style="margin:0 -16px" id="about">
        <div class="w3-center w3-padding-64">
          <span class="w3-xlarge w3-bottombar w3-border-grey w3-padding-16">Quienes somos</span>
        </div>

        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/soto.jpg" alt="Norway" style="width:100%">
            <div class="w3-container">
              <h3>Gustavo A. Soto</h3>
              <p class="w3-opacity">Porras por whastapp</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-btn w3-green">Contacto</button></p>
            </div>
          </div>
        </div>

        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/pablo.jpg" width="100%" alt="Soto">
          <div class="w3-container">
              <h3>Pablo Valenzuela</h3>
              <p class="w3-opacity">Wix Director</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-btn w3-green">Contacto</button></p>
            </div>
          </div>
        </div>

        <div class="w3-third w3-margin-bottom">
          <div class="w3-card-4">
            <img src="img/cano.jpg" alt="Norway" style="width:100%">
            <div class="w3-container">
              <h3>Ignacio Cano</h3>
              <p class="w3-opacity">Avisar que ya viene</p>
              <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
              <p><button class="w3-btn w3-green">Contacto</button></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact -->
      <div class="w3-center w3-padding-64" id="contact">
        <span class="w3-xlarge w3-bottombar w3-border-grey w3-padding-16">Contactanos</span>
      </div>

      <form>
        <div class="w3-group">
          <label>Nombre</label>
          <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text">
        </div>
        <div class="w3-group">
          <label>Correo</label>
          <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text">
        </div>
        <div class="w3-group">
          <label>Asunto</label>
          <input class="w3-input w3-border w3-hover-border-black" style="width:100%;">
        </div>
        <button type="button" class="w3-btn w3-btn-block nav w3-padding-12">Enviar</button>
      </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-red w3-center">
      <h4>Por fin llegaste :)</h4>
      <p>Hecho con <i class="fa fa-heart"></i> por un mejor servicio</a></p>
    </footer>

    <script>
    // Navbar script
    function myFunction() {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>
  </body>
</html>
