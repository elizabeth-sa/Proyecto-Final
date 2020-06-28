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
      <h2 id="title">Encuestas</h2>
      <?php
        //incluímos archivo de configuración
        include_once './configuracion.php';
        //Inicia conexión con base de datos
        $conexion = mysqli_connect(local, usuario, contrasena, nombre);
        if( !$conexion ){
          echo mysqli_connect_error();
          exit();
        }
        else {
          //Refiere a entidad Encuesta
          $consulta = "SELECT * FROM Encuesta";
          $respuesta = mysqli_query($conexion, $consulta);
          while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
            echo "<form class='datos' action= './Enc.php' method= 'POST'>";
              echo "IdEncuesta: <input type = 'hidden' name = 'id' value = '$fila[0]'/>".$fila[0]."<br>";
              echo "Categoría: <input type= 'text' name = 'categoria' value = '$fila[3]'/><br>";
              echo "*Las categorías en las encuestas pueden ser únicamente: 'Actividades Académicas', 'Ciencia', 'Cultura', 'Deportes' u 'Otro'<br>";
              echo "<p><input type = 'radio' name = 'modif' value = 'Modificar'/>Modificar";
              echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
              echo "<p><input type = 'submit' value = 'Modificar/Eliminar'/></p>";
            echo "</form>";
          }
        }
      ?>
      <script src="../js/admin.js"></script>
    </body>
</html>
