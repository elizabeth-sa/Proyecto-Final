<html>
	<head>
		<title><?php $titulo=$_POST['titulo1']; echo $titulo; ?></title>
	</head>
	<body>
		<?php

		$m=$_POST['m'];

		echo "OPCIONES<br>";
		for($n=1;$n<$m;$n++){
			${"Pregunta".$n}=$_POST['Pregunta'.$n];
			${"Nopciones".$n}=$_POST['Nopciones'.$n];
			echo ${"Pregunta".$n}."<br><br>";
			for($i=1;$i<=${"Nopciones".$n};$i++){
				echo "Opcion ".$i."<br>";
				echo "En caso de texto: <input type=text><br>";
				echo "En caso de numero: <input type=number><br>";
				echo "En caso de imagen: <input type=file><br><br>";
			}
			echo "<br><br><br>";
		}
		echo "<input type=submit>";

		?>
	</body>
</html>