<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Administrador</title>
    </head>
    <body>
        <fieldset><legend><h2>Perfiles de usuarios</h2></legend>
        <?php
          //incluímos archivo de configuración
          include_once './configuracion.php';

          $conexion = mysqli_connect(local, usuario, contrasena, nombre);
          if( !$conexion ){
            echo mysqli_connect_error();
            exit();
          }
          else {
            //Refiere a entidad "Alumno"
            $consulta = "SELECT * FROM Alumno";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset><legend><h3>Alumnos</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './Ad.php' method= 'POST'>";
                    echo "Número de cuenta: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Fecha de Nacimiento: <input type= 'hidden' name = 'fecha' value = '$fila[1]'/>".$fila[1]."<br>";
                    echo "CURP: <input type = 'hidden' name = 'curp' value = '$fila[2]'/>".$fila[2]."<br>";
                    echo "Nombre: <input type = 'hidden' name = 'nombre' value = '$fila[3]'/>".$fila[3]."<br>";
                    echo "Correo: <input type = 'hidden' name = 'correo' value = '$fila[4]'/>".$fila[4]."<br>";
                    echo "Contraseña: <input type = 'hidden' name = 'contra' value = '$fila[5]'/>".$fila[5]."<br>";
                    echo "Foto: <input type = 'hidden' name = 'foto' value = '$fila[6]'/>".$fila[6]."<br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Bloquear' checked/>Bloquear";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Bloquear'/></p>";
                    echo "<input type = 'hidden' name = 'cliente' value = 'Alumno'/>";
                    echo "</form>";
            }
            echo "</fieldset>";
            //Refiere a entidad "Profesor"
            $consulta = "SELECT * FROM Profesor";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset><legend><h3>Profesores</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './Ad.php' method= 'POST'>";
                    echo "RFC: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Fecha de Nacimiento: <input type= 'hidden' name = 'fecha' value = '$fila[1]'/>".$fila[1]."<br>";
                    echo "Nombre: <input type = 'hidden' name = 'nombre' value = '$fila[2]'/>".$fila[2]."<br>";
                    echo "Número de Trabajador: <input type = 'hidden' name = 'trabajador' value = '$fila[3]'/>".$fila[3]."<br>";
                    echo "Correo: <input type = 'hidden' name = 'correo' value = '$fila[4]'/>".$fila[4]."<br>";
                    echo "Contraseña: <input type = 'hidden' name = 'contra' value = '$fila[5]'/>".$fila[5]."<br>";
                    echo "Foto: <input type = 'hidden' name = 'foto' value = '$fila[6]'/>".$fila[6]."<br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Bloquear' checked/>Bloquear";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Bloquear'/></p>";
                    echo "<input type = 'hidden' name = 'cliente' value = 'Prof'/>";
                    echo "</form>";
            }
            echo "</fieldset>";
          }
          mysqli_close($conexion);
        ?>
        </fieldset>
    </body>
</html>
