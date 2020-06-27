<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Administrador</title>
    </head>
    <body>
        <fieldset><legend><h2>Encuestas</h2></legend>
        <?php
            //Inicia conexión con base de datos
            $conexion = mysqli_connect("localhost", "elAullido", "314uILid0", "ElAullido");
            //Refiere a entidad Encuesta
            $consulta = "SELECT * FROM Encuesta";
            $respuesta = mysqli_query($conexion, $consulta);
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './Enc.php' method= 'POST'>";
                    echo "IdEncuesta: <input type = 'hidden' name = 'id' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Categoría: <input type= 'text' name = 'categoria' value = '$fila[3]'/><br>";
                    echo "*Las categorías en las encuestas pueden ser únicamente: 'Actividades Académicas', 'Ciencia', 'Cultura', 'Deportes' u 'Otro'<br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Modificar'/>Modificar";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Modificar/Eliminar'/></p>";
                    echo "</form>";
            }
        ?>
        </fieldset>
    </body>
</html>