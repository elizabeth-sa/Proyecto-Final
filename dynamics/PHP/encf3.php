<html>
	<head>
		<title><?php $titulo=$_POST['titulo']; echo $titulo; ?></title>
	</head>
	<body>
    <h1><?php $titulo=$_POST['titulo']; echo $titulo; ?></h1>
    <?php
    $preguntas=$_POST['preguntas'];
    for($i=1;$i<=$preguntas;$i++){
      ${"opcion".$i}=$_POST['optex'.$i];
      ${"pregunta".$i} = $_POST['p'.$i];
      ${"tipo".$i} = $_POST['tipo'.$i];
    }
    echo "<form action=encf3.php method=post>";
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
        echo "<select name='opcion".$m."'>";
        for($i=1;$i<=$preguntas;$i++){
          echo "<option value='opcion".$m."'>${"opcion".$i}</option>";
        }
        echo "</select>";
        $m++;
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
