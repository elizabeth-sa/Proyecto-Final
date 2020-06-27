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
    $conexion = mysqli_connect("localhost", "elAullido", "314uILid0", "ElAullido");
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    //Envía mensaje de acción realizada
    if($modif == "Bloquear")
        echo "El usuario '$usuario' de nombre '$nombre' ha sido bloqueado en la base de datos.";
    else
        echo "El usuario '$usuario' de nombre '$nombre' se ha eliminado de la base de datos.";
    //Link de regreso
    echo "<p><a href = './Admin.php'>Regresa a pantalla de usuarios</a></p>";
?>