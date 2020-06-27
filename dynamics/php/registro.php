<?php
  //incluímos archivo de configuración
  include_once './configuracion.php';

  $conexion = mysqli_connect(local, usuario, contrasena, nombre);
  if( !$conexion ){
    echo mysqli_connect_error();
    exit();
  }
  //si el registro es de un alunmo realiza lo siguiente
  else if (isset($_POST['registro']) && $_POST['registro'] == "alumno"){
    //recibimos datos
    $cuenta = htmlentities((isset($_POST['cuenta']) && $_POST['cuenta'] != " ")? $_POST['cuenta'] : "Desconocido");
    $cuenta = strip_tags($cuenta);
    $fecha = htmlentities((isset($_POST['fecha']) && $_POST['fecha'] != " ")? $_POST['fecha'] : "Desconocido");
    $fecha = strip_tags($fecha);
    $curp = htmlentities((isset($_POST['curp']) && $_POST['curp'] != " ")? $_POST['curp'] : "Desconocido");
    $curp = strip_tags($curp);
    $nombre = htmlentities((isset($_POST['nombre']) && $_POST['nombre'] != " ")? $_POST['nombre'] : "Desconocido");
    $nombre = strip_tags($nombre);
    $app = htmlentities((isset($_POST['app']) && $_POST['app'] != " ")? $_POST['app'] : "Desconocido");
    $app = strip_tags($app);
    $apm = htmlentities((isset($_POST['apm']) && $_POST['apm'] != " ")? $_POST['apm'] : " ");
    $apm = strip_tags($apm);
    $correo = htmlentities((isset($_POST['correo']) && $_POST['correo'] != " ")? $_POST['correo'] : "Desconocido");
    $correo = strip_tags($correo);
    $pass = htmlentities((isset($_POST['pass']) && $_POST['pass'] != " ")? $_POST['pass'] : "Desconocido");
    $pass = strip_tags($pass);
    //hasheamos contraseña
    $pass  = password_hash($pass,PASSWORD_BCRYPT);
    //y ciframos datos sensibles
    $nom = $nombre;
    $nombre.=" ".$app." ".$apm;
    $nombre=cifrado($nombre);
    $curp=cifrado($curp);
    $correo=cifrado($correo);
    $cuenta=cifrado($cuenta);
    //corroboramos que el usuario no exita ya en la base de datos
    $consulta = "SELECT NoCuenta FROM alumno";
    $respuesta= mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
    $existe=0;
    if ($row!=NULL) {
      $cuenta_desc=descifrado($cuenta);
      foreach ($row as $key => $value) {
        $cuenta_revisar=descifrado($value);
        if ($cuenta_revisar==$cuenta_desc) {
          $existe=1;
        }
      }
      //Si ya existe un usuario asociado al numero de cuenta ingresado
      if($existe==1){
        header("Location: ./respuesta.php");
      }
      //si todo esta en orden, puede insertar datos
      else {
        $consulta = "INSERT INTO alumno (NoCuenta, FechaNac, CURP, Nombre, Correo, Contrasena, Foto, Modo, Elaboradas, Contestadas, Bloqueo) VALUES ('".$cuenta."', '".$fecha."', '".$curp."', '".$nombre."', '".$correo."', '".$pass."', 'profile.jpg', 'Claro', '0', '0', 'No')";
        $consulta2= mysqli_real_escape_string($conexion, $consulta);
        mysqli_query($conexion, $consulta2);
        //Iniciamos sesión y almacenamos sus datos
        session_name("ElAullido");
        session_id("3141592653");
        session_start();
        $_SESSION['nombre'] = $nom;
        $_SESSION['usuario'] = $cuenta;
        header("Location: ./perfil.php");
      }
    }
    //si es el primer registro inserta datos
    else{
      $consulta = "INSERT INTO alumno (NoCuenta, FechaNac, CURP, Nombre, Correo, Contrasena, Foto, Modo, Elaboradas, Contestadas, Bloqueo) VALUES ('".$cuenta."', '".$fecha."', '".$curp."', '".$nombre."', '".$correo."', '".$pass."', 'profile.jpg', 'Claro', '0', '0', 'No')";
      $consulta2= mysqli_real_escape_string($conexion, $consulta);
      mysqli_query($conexion, $consulta);
      //Iniciamos sesión y almacenamos sus datos
      session_name("ElAullido");
      session_id("3141592653");
      session_start();
      $_SESSION['nombre'] = $nom;
      $_SESSION['usuario'] = $cuenta;
      header("Location: ./perfil.php");
    }
  }
  //si el registro es de un profesor realiza lo siguiente
  else if (isset($_POST['registro']) && $_POST['registro'] == "profesor") {
    //recibimos datos
    $rfc = htmlentities((isset($_POST['rfc']) && $_POST['rfc'] != " ")? $_POST['rfc'] : "Desconocido");
    $rfc = strip_tags($rfc);
    $nombre = htmlentities((isset($_POST['nombre']) && $_POST['nombre'] != " ")? $_POST['nombre'] : "Desconocido");
    $nombre = strip_tags($nombre);
    $app = htmlentities((isset($_POST['app']) && $_POST['app'] != " ")? $_POST['app'] : "Desconocido");
    $app = strip_tags($app);
    $apm = htmlentities((isset($_POST['apm']) && $_POST['apm'] != " ")? $_POST['apm'] : "Desconocido");
    $apm = strip_tags($apm);
    $num = htmlentities((isset($_POST['num']) && $_POST['num'] != " ")? $_POST['num'] : "Desconocido");
    $num = strip_tags($num);
    $correo = htmlentities((isset($_POST['correo']) && $_POST['correo'] != " ")? $_POST['correo'] : "Desconocido");
    $correo = strip_tags($correo);
    $pass = htmlentities((isset($_POST['pass']) && $_POST['pass'] != " ")? $_POST['pass'] : "Desconocido");
    $pass = strip_tags($pass);
    $nombre.=" ".$app." ".$apm;
  }
  //si no recibe datos de ningún form redirige al registro
  else {
    header("Location: ../../templates/registro.html");
  }
  mysqli_close($conexion);
?>
