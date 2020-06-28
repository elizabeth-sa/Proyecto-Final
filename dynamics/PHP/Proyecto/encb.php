<?php
  $titulo=$_POST['titulo'];
  $preguntas=$_POST['preguntas'];
  echo "<form action=encf2.php method=post>";
  echo "<input name=titulo1 type=hidden value='".$titulo."'>";
  $m=1;
  for($i=1;$i<=$preguntas;$i++){
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
  echo "</form>";
?>
