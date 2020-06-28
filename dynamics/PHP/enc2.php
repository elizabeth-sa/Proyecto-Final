<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear Encuesta</title>
    <link rel="icon" href="../../statics/media/logo_lobo.png">
    <!--Librería de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!--Enlace de google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <!--Hoja de diseño-->
    <link rel="stylesheet" href="../../statics/css/encuestas.css">
  </head>
  <body>
    <form action="encf.php" method="post">
        <nav>
          <!--Botón para regresar al index-->
          <button type="button" id="regresar" name="button">Regresar</button>
        </nav>
        <?php
          if (isset($_POST['titulo'])!=TRUE) {
            header("Location: ../../templates/encuesta.html");
          }
          $titulo = htmlentities((isset($_POST['titulo']) && $_POST['titulo'] != " ")? $_POST['titulo'] : "Desconocido");
          $titulo = strip_tags($titulo);
          $preguntas = htmlentities((isset($_POST['preguntas']) && $_POST['preguntas'] != " ")? $_POST['preguntas'] : "Desconocido");
          $preguntas = strip_tags($preguntas);
          echo '<h1 id="title">'.$titulo.'</h1>';
          echo '<h3 class="ask_r">¡Hola! Por favor elabora tus preguntas.</h3>';
        ?>
        <div id="form_f">
        <?php
          for($i=1;$i<=$preguntas;$i++){
        ?>
        <!--Cada dato recogido esta dividido separado en un "renglón"-->
        <div class="renglon">
          <div class="respuesta_r">
            <div class="icon">
              <i class="fas fa-question-circle" id="symbol"></i>
            </div>
          <label>Pregunta <?php echo $i; ?></label>
          </div>
          <input name="p<?php echo $i;?>" type="text" class="input" placeholder="..." autocomplete="off" size="50" maxlength="50" required>
          <label>Tipo:</label> <select name='tipo<?php echo $i;?>' class="input" required>
            <option value='Numeros'>Numerico</option>
            <option value='Opciones'>Opciones</option><br>
          </select>
        </div>
        <?php } ?>
        <input type="hidden" name="titulo" value="<?php echo $titulo;?>">
        <input type="hidden" name="preguntas" value="<?php echo $preguntas;?>">
        <input type="submit" name="Submit" id="enviar" value="Enviar"></p>
      </div>
    </form>
    <script src="../js/enc.js"></script>
  </body>
</html>
