<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="guardarPerfil.php" method="post">
      <h2>Mostrar informacion de contacto:</h2>
      <p>Ten en cuenta que reclutadores pueden ver esta información para ofertar trabajo!</p>
      <h3>Correo</h3>
      <label for="siCorreo">Si</label>
      <input id="siCorreo" type="radio" name="shwMail" value="SI">
      <label for="noCorreo">No</label>
      <input id="noCorreo" type="radio" name="shwMail" value="NO">

      <h3>Telefono</h3>
      <label for="siTel">Si</label>
      <input id="siTel" type="radio" name="shwCel" value="SI">
      <label for="noTel">No</label>
      <input id="noTel" type="radio" name="shwCel" value="NO">

      <h2>Lenguajes manejados:</h2>
      <div class="">
        <label for="">Lenguaje 1:</label>
        <select class="" name="leng1">
          <option></option>
          <option>Ingles</option>
          <option>Frances</option>
          <option>Italiano</option>
          <option>Chino Mandarin</option>
          <option>Japones</option>
        </select>
        <label for="">Porciento dominado: %</label>
        <input type="text" name="leng1Prc">
      </div>

      <div class="">
        <label for="">Lenguaje 2:</label>
        <select class="" name="leng2">
          <option></option>
          <option>Ingles</option>
          <option>Frances</option>
          <option>Italiano</option>
          <option>Chino Mandarin</option>
          <option>Japones</option>
        </select>
        <label for="">Porciento dominado: %</label>
        <input type="text" name="leng2Prc">
      </div>

      <div class="">
        <label for="">Lenguaje 3:</label>
        <select class="" name="leng3">
          <option></option>
          <option>Ingles</option>
          <option>Frances</option>
          <option>Italiano</option>
          <option>Chino Mandarin</option>
          <option>Japones</option>
        </select>
        <label for="">Porciento dominado: %</label>
        <input type="text" name="leng3Prc">
      </div>

      <div class="">
        <label for="">Lenguaje 4:</label>
        <select class="" name="leng4">
          <option></option>
          <option>Ingles</option>
          <option>Frances</option>
          <option>Italiano</option>
          <option>Chino Mandarin</option>
          <option>Japones</option>
        </select>
        <label for="">Porciento dominado: %</label>
        <input type="text" name="leng4Prc">
      </div>

      <div class="">
        <label for="">Lenguaje 5:</label>
        <select class="" name="leng5">
          <option></option>
          <option>Ingles</option>
          <option>Frances</option>
          <option>Italiano</option>
          <option>Chino Mandarin</option>
          <option>Japones</option>
        </select>
        <label for="">Porciento dominado: %</label>
        <input type="text" name="leng5Prc">
      </div>

      <h2>
        Experiencia laboral y poyectos desarrollados:
      </h2>
      <div class="">
        <label for="">Experiencia 1</label>
        <input type="text" name="exp1">

        <label for="">Detalles</label>
        <textarea name="exp1_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Experiencia 2</label>
        <input type="text" name="exp2">

        <label for="">Detalles</label>
        <textarea name="exp2_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Experiencia 3</label>
        <input type="text" name="exp3">

        <label for="">Detalles</label>
        <textarea name="exp3_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Experiencia 4</label>
        <input type="text" name="exp4">

        <label for="">Detalles</label>
        <textarea name="exp4_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Experiencia 5</label>
        <input type="text" name="exp5">

        <label for="">Detalles</label>
        <textarea name="exp5_det" rows="8" cols="40"></textarea>
      </div>

      <h2>
        Educación y certificados:
      </h2>
      <div class="">
        <label for="">Educación 1</label>
        <input type="text" name="edu1">

        <label for="">Detalles</label>
        <textarea name="edu1_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Educación 2</label>
        <input type="text" name="edu2">

        <label for="">Detalles</label>
        <textarea name="edu2_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Educación 3</label>
        <input type="text" name="edu3">

        <label for="">Detalles</label>
        <textarea name="edu3_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Educación 4</label>
        <input type="text" name="edu4">

        <label for="">Detalles</label>
        <textarea name="edu4_det" rows="8" cols="40"></textarea>
      </div>

      <div class="">
        <label for="">Educación 5</label>
        <input type="text" name="edu5">

        <label for="">Detalles</label>
        <textarea name="edu5_det" rows="8" cols="40"></textarea>
      </div>
    </form>

  </body>
</html>
