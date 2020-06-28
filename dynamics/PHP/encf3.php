<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<title><?php $titulo=$_POST['titulo']; echo $titulo; ?></title>
	</head>
	<body>
    <h1><?php $titulo=$_POST['titulo']; echo $titulo; ?></h1>
    <?php
    $preguntas=$_POST['preguntas'];
    $IJ=$_POST['J'];
    for($i=1;$i<$IJ;$i++){
      ${"Nopciones".$i}=$_POST['NOPCIONES'.$i];
    }
    $abc=1;
    for($i=1;$i<=$preguntas;$i++){
      if($_POST[$abc.'optex'.$i]!=null){
        ${"opcion".$i}=$_POST[$abc.'optex'.$i];
      }
      if($_POST[$abc.'opnum'.$i]!=null){
        ${"opcion".$i}=$_POST[$abc.'opnum'.$i];
      }
      if($_POST[$abc.'opimg'.$i]!=null){
        ${"opcion".$i}=$_POST[$abc.'opimg'.$i];
      }
      ${"pregunta".$i} = $_POST['PREGS'.$i];
      ${"tipo".$i} = $_POST['TIPOS'.$i];
      $abc++;
    }
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
          echo "<select name='Pregop".$m."'>";
          for($f=1;$f<=${"Nopciones".$m};$f++){
            echo "<option>".${"opcion".$f}."</option>";
          }
          echo "</select>";
          $m++;
        break;
        default:
        break;

      }
      echo "<br>";
      echo "</span>";
    }
    echo "<br>";
    echo "<input type=submit>";
    ?>
  </body>
</html>
