<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Administrador</title>
      <link rel="icon" href="../../statics/media/logo_lobo.png">
      <!--Librería de font awesome-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
      <!--Enlace de google fonts-->
      <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
      <!--Hoja de diseño-->
      <link rel="stylesheet" href="../../statics/css/admin.css">
    </head>
    <body>
      <nav>
        <!--Botón para regresar al index-->
        <button type="button" id="regresar" name="button">Regresar</button>
      </nav>
      <h2 id="title">Perfiles de usuarios</h2>
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
          echo "<h3>Alumnos</h3>";
          while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
              echo "<form class='datos' action= './Ad.php' method= 'POST'>";
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
          //Refiere a entidad "Profesor"
          //where RFC != 'IfIPs3qiWeyINSJPZ7VGAQooqEekC5iXniy3GBxdcxY='
          $consulta = "SELECT * FROM Profesor ";
          $respuesta = mysqli_query($conexion, $consulta);
          echo "<h3>Profesores</h3>";
          while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
              echo "<form class='datos' action= './Ad.php' method= 'POST'>";
                  echo "RFC: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                  echo "Fecha de Nacimiento: <input type= 'hidden' name = 'fecha' value = '$fila[1]'/>".$fila[1]."<br>";
                  echo "Nombre: <input type = 'hidden' name = 'nombre' value = '$fila[2]'/>".$fila[2]."<br>";
                  echo "Número de Trabajador: <input type = 'hidden' name = 'trabajador' value = '$fila[3]'/>".$fila[3]."<br>";
                  echo "Correo: <input type = 'hidden' name = 'correo' value = '$fila[4]'/>".$fila[4]."<br>";
                  echo "Contraseña: <input type = 'hidden' name = 'contra' value = '$fila[5]'/>".$fila[5]."<br>";
                  echo "Foto: <input type = 'hidden' name = 'foto' value = '$fila[6]'/>".$fila[6]."<br>";
                  echo "<p><input type = 'radio' name = 'modif' value = 'Bloquear' checked/>Bloquear";
                  echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                  echo "<p><input type = 'submit' id='confirmar' value = 'Eliminar/Bloquear'/></p>";
                  echo "<input type = 'hidden' name = 'cliente' value = 'Prof'/>";
                  echo "</form>";
          }
        }
        mysqli_close($conexion);
      ?>
      <script src="../js/admin.js"></script>
    </body>
</html>
