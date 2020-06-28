<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Configuración</title>
    <!--Librería de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!--Enlace de google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <!--Hoja de diseño-->
    <link rel="stylesheet" href="../../statics/css/ad.css">
  </head>
  <body>
    <h1 id="title">Configuración</h1>
    <?php
        //No. de cuenta o RFC
        $usuario = $_POST["usuario"];
        //Alumno o Prof
        $cliente = $_POST["cliente"];
        //Actualizar o Bloquear
        $modif = $_POST["modif"];
        //Variables ambos
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contra"];
        //Si es alumno, recibe variable de CURP
        if($cliente == "Alumno"){
            $curp = $_POST["curp"];
            //Condiciones para bloquear o eliminar el registro
            if($modif == "Bloquear")
                $consulta = "UPDATE Alumno SET Bloqueo='Si' WHERE NoCuenta='$usuario'";
            else
                $consulta = "DELETE FROM Alumno WHERE NoCuenta='$usuario'";
        }
        //Si es profesor recibe varible de número de trabajador
        elseif($cliente == "Prof"){
            $trabajador = $_POST["trabajador"];
            //Condiciones para bloquear o eliminar el registro
            if($modif == "Bloquear")
                $consulta = "UPDATE Profesor SET Bloqueo='Si' WHERE RFC='$usuario'";
            else
                $consulta = "DELETE FROM Profesor WHERE RFC='$usuario'";
        }
        //Inicia conexión con base, ejecuta la consulta y cierra conexión
        //incluímos archivo de configuración
        include_once './configuracion.php';

        $conexion = mysqli_connect(local, usuario, contrasena, nombre);
        if( !$conexion ){
          echo mysqli_connect_error();
          exit();
        }
        else {
          mysqli_query($conexion, $consulta);
        }
        mysqli_close($conexion);
        //Envía mensaje de acción realizada
        if($modif == "Bloquear")
            echo "El usuario '$usuario' de nombre '$nombre' ha sido bloqueado en la base de datos.";
        else
            echo "El usuario '$usuario' de nombre '$nombre' se ha eliminado de la base de datos.";
        //Link de regreso
        echo "<p><a href = './Admin.php'>Regresa a pantalla de usuarios</a></p>";
    ?>
  </body>
</html>
