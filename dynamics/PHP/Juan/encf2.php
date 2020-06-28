<html>
	<head>
		<title><?php $titulo=$_POST['titulo1']; echo $titulo; ?></title>
	</head>
	<body>
		<?php
		$titulo=$_POST['titulo'];
		$preguntas=$_POST['preguntas'];
		for($i=1;$i<=$preguntas;$i++){
			${"pregunta".$i} = $_POST['p'.$i];
			${"tipo".$i} = $_POST['tipo'.$i];
		}
		$m=$_POST['m'];
		echo "<form action=encf3.php method=post>";
		echo "OPCIONES<br>";
		for($n=1;$n<$m;$n++){
			${"Pregunta".$n}=$_POST['Pregunta'.$n];
			${"Nopciones".$n}=$_POST['Nopciones'.$n];
			echo ${"Pregunta".$n}."<br><br>";
			for($i=1;$i<=${"Nopciones".$n};$i++){
				echo "Opcion ".$i."<br>";
				echo "En caso de texto: <input type=text name='optex$i'><br>";
				echo "En caso de numero: <input type=number name='opnum$i'><br>";
				echo "En caso de imagen: <input type=file name='opimg$i'><br><br>";
			}
			echo "<br><br><br>";
		}
		echo "<input name='titulo' type='hidden' value='".$titulo."'>";
		echo "<input type='hidden' name='preguntas' value='".$preguntas."'>";
		for($i=1;$i<=$preguntas;$i++){?>
			<input name='p<?php echo $i; ?>' type='hidden' value='<?php echo ${"pregunta".$i}; ?>'>
			<input name='tipo<?php echo $i; ?>' type='hidden' value='<?php echo ${"tipo".$i}; ?>'>
		<?php }
		/*for($n=1;$n<$m;$n++){?>
			<input name='opcion<?php echo $n; ?>' type='hidden' value='<?php echo ${"Nopciones".$n}; ?>'>
		<?php }*/
		echo "<input name='m' type='hidden' value='".$m."'>";
		echo "<input type=submit>";

		?>
	</body>
</html>
