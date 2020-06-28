<!DOCTYPE html>
<html lang="en" dir="ltr">
  	<head>
    	<meta charset="utf-8">
		<title><?php $titulo=$_POST['titulo1']; echo $titulo; ?></title>
    <link rel="icon" href="../../statics/media/logo_lobo.png">
    <!--Librería de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!--Enlace de google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <!--Hoja de diseño-->
    <link rel="stylesheet" href="../../statics/css/encuestas_owo.css">
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
  		$titulo=$_POST['titulo'];
  		$preguntas=$_POST['preguntas'];
  		for($i=1;$i<=$preguntas;$i++){
  			${"pregunta".$i} = $_POST['PR'.$i];
  			${"tipo".$i} = $_POST['TIPO'.$i];
  		}
  		$m=$_POST['m'];
      echo "<h1 id='title'>OPCIONES</h1>";
  		echo "<form id='form_f2' action=encf3.php method=post>";
  		for($n=1;$n<$m;$n++){
  			${"Pregunta".$n}=$_POST['Pregunta'.$n];
  			echo "<input name=PREGOP".$n." type=hidden value=".${"Pregunta".$n}." />";
  			${"Nopciones".$n}=$_POST['Nopciones'.$n];
  			echo "<h5>".${"Pregunta".$n}."</h5>";
  			for($i=1;$i<=${"Nopciones".$n};$i++){
  				echo "<p>Opcion ".$i."</p><br>";
          echo "<div class='renglon'>
            <div class='respuesta_r'>
              <div class='icon'>
                <i class='fas fa-question-circle' id='symbol'></i>
              </div>
            <label>En caso de texto:</label>
            </div>
            <input name='".$n."optex$i' type='text' class='input' placeholder='...' autocomplete='off' size='50' maxlength='50'>
          </div>";
          echo "<div class='renglon'>
            <div class='respuesta_r'>
              <div class='icon'>
                <i class='fas fa-question-circle' id='symbol'></i>
              </div>
            <label>En caso de numero:</label>
            </div>
            <input name='".$n."opnum$i' type='number' class='input' placeholder='...' autocomplete='off' size='50' maxlength='50'>
          </div>";
          echo "<div class='renglon'>
            <div class='respuesta_r'>
              <div class='icon'>
                <i class='fas fa-question-circle' id='symbol'></i>
              </div>
            <label>En caso de imagen:</label>
            </div>
            <input name='".$n."opimg$i' type='file' class='input' placeholder='...' autocomplete='off' size='50' maxlength='50'>
          </div>";
  			}
  			echo "<br><br><br>";
  		}
  		echo "<input name='titulo' type='hidden' value='".$titulo."'>";
  		echo "<input type='hidden' name='preguntas' value='".$preguntas."'>";
  		echo "<input name='m' type='hidden' value='".$m."'>";
  		for($f=1;$f<=$preguntas;$f++){
  			echo "<input name=PREGS".$f." type=hidden value='".${"pregunta".$f}."' />";
          	echo "<input name=TIPOS".$f." type=hidden value='".${"tipo".$f}."' />";
  		}
  		for($j=1;$j<$n;$j++){
  			echo "<input name=NOPCIONES".$j." type=hidden value=".${"Nopciones".$j}." >";
  		}
  		echo "<input name=J type=hidden value=".$j." />";
  		echo "<input id='enviar' type=submit>";
  		echo "</form>";
		?>
    <script src="../js/enc.js"></script>
	</body>
</html>
