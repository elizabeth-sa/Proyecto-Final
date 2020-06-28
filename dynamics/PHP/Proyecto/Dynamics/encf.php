<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php $titulo = $_POST['titulo']; echo $titulo; ?></title>
  </head>
  <body>
    <?php
      $preguntas = $_POST['preguntas'];
      $titulo = $_POST['titulo'];
      echo $titulo;
      for($i=1;$i<=$preguntas;$i++){
        ${"pregunta".$i} = $_POST['p'.$i];
        ${"tipo".$i} = $_POST['tipo'.$i];
      }
      /*$pregunta2 = $_POST['p2'];
      $pregunta3 = $_POST['p3'];
      $pregunta4 = $_POST['p4'];
      $pregunta5 = $_POST['p5'];
      $pregunta6 = $_POST['p6'];*/
      /*$tipo2 = $_POST['tipo2'];
      $tipo3 = $_POST['tipo3'];
      $tipo4 = $_POST['tipo4'];
      $tipo5 = $_POST['tipo5'];
      $tipo6 = $_POST['tipo6'];
      echo $preguntas;*/
      /*echo $pregunta1.$tipo1;
      echo "<br>";
      echo $pregunta2.$tipo2;
      echo "<br>";
      echo $pregunta3.$tipo3;
      echo "<br>";
      echo $pregunta4.$tipo4;
      echo "<br>";
      echo $pregunta5.$tipo5;
      echo "<br>";
      echo $pregunta6.$tipo6;
      echo $titulo;
      for($i=1;$i<=$preguntas;$i++){*/
      echo "<form action=encf2.php method=post>";
      echo "<input name=titulo1 type=hidden value='".$titulo."'>";
      $m=1;
      for($i=1;$i<=$preguntas;$i++){
        echo "<input name=PR".$i." type=hidden value='".${"pregunta".$i}."' />";
        echo "<input name=TIPO".$i." type=hidden value='".${"tipo".$i}."' />";
        echo "<span> ${'pregunta'.$i} <br>";
        switch(${"tipo".$i}){
          case "Texto":
            echo "<input type=text name='".${'pregunta'.$i}."'>";
            break;
          case "Numeros":
            echo "<input type=number name='".${"pregunta".$i}."'>";
            break;
          case "Opciones":
            echo "<input name='Pregunta".$m."' type=hidden value='".${"pregunta".$i}."'>";
            echo "Numero de opciones: <input type=number name='Nopciones".$m."'>";
            $m++;
            break;
        }
        echo "<br>";
        echo "</span>";
      }
      echo "<input name=m type=hidden value='".$m."'>";
      echo "<input type=submit value=Continuar>";
      echo "<input name='titulo' type='hidden' value='".$titulo."'>";
      echo "<input type='hidden' name='preguntas' value='".$preguntas."'>";
      echo "</form>";
     ?>
  </body>
</html>
