<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php $titulo = $_POST['titulo']; echo $titulo; ?></title>
    <link rel="icon" href="../../statics/media/logo_lobo.png">
    <!--Librería de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!--Enlace de google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <!--Hoja de diseño-->
    <link rel="stylesheet" href="../../statics/css/encuestas.css">
  </head>
  <body>
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
      echo '<h3 class="ask_r">¡Hola! Por favor selecciona tu numero de opciones.</h3>';
      for($i=1;$i<=$preguntas;$i++){
        ${"pregunta".$i} = $_POST['p'.$i];
        ${"tipo".$i} = $_POST['tipo'.$i];
      }
      echo "<form id='form_f' action=encf2.php method=post>";
      echo "<input name=titulo1 type=hidden value='".$titulo."'>";
      $m=1;
      for($i=1;$i<=$preguntas;$i++){
        echo "<input name=PR".$i." type=hidden value='".${"pregunta".$i}."' />";
        echo "<input name=TIPO".$i." type=hidden value='".${"tipo".$i}."' />";
        //Cada dato recogido esta dividido separado en un "renglón"
        echo "<div class='renglon'> <div class='respuesta_r'>
          <div class='icon'>
            <i class='fas fa-question-circle' id='symbol'></i>
          </div>
          <label> ${'pregunta'.$i} </label>
        </div>";
        switch(${"tipo".$i}){
          case "Texto":
            echo "<input type=text class='input' placeholder='#' autocomplete='off' name='".${'pregunta'.$i}."' required>";
            break;
          case "Numeros":
            echo "<input type=number class='input' placeholder='#' autocomplete='off' name='".${"pregunta".$i}."'>";
            break;
          case "Opciones":
            echo "<input name='Pregunta".$m."' type=hidden value='".${"pregunta".$i}."'>";
            echo "<input type=number class='input' placeholder='#' autocomplete='off' name='Nopciones".$m."'>";
            $m++;
            break;
        }
        echo "</div>";
      }
      echo "<input name=m type=hidden value='".$m."'>";
      echo "<input type='hidden' name='titulo' value='".$titulo."'>";
      echo "<input type='hidden' name='preguntas' value='".$preguntas."'>";
      echo "<input type=submit id='enviar' value=Continuar>";
      echo "</form>";
     ?>
     <script src="../js/enc.js"></script>
  </body>
</html>
