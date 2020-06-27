<?php
    //Modificar categoría
    $modif = $_POST["modif"];
    //Variables 
    $id = $_POST["id"];
    $categoria = $_POST["categoria"];

    //Condición para modificar la categoría o eliminar la encuesta
    if($modif == "Modificar")
        $consulta = "UPDATE Encuesta SET Categoria = '$categoria' WHERE IdEncuesta='$id'";
    else
        $consulta = "DELETE FROM Encuesta WHERE IdEncuesta='$id'";

    //Inicia conexión con base, ejecuta la consulta y cierra conexión
    $conexion = mysqli_connect("localhost", "elAullido", "314uILid0", "ElAullido");
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    //Envía mensaje de acción realizada
    if($modif == "Modificar")
        echo "La categoría de la encuesta con ID = '$id' ha sido actualizada en la base de datos.";
    else
        echo "La encuesta con ID = '$id' ha sido eliminada en la base de datos.";
    //Link de regreso
    echo "<p><a href = './Encuesta.php'>Regresa a pantalla de administración de encuestas</a></p>";
?>