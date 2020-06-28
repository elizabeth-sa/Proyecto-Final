<?php
  //incluímos archivo de configuración
  include_once './configuracion.php';

  $conexion = mysqli_connect(local, usuario, contrasena, nombre);
  if( !$conexion ){
    echo mysqli_connect_error();
    exit();
  }
  else {
    $user = htmlentities((isset($_POST['user']) && $_POST['user'] != " ")? $_POST['user'] : "Desconocido");
    $user = strip_tags($user);
    $pass = htmlentities((isset($_POST['pass']) && $_POST['pass'] != " ")? $_POST['pass'] : "Desconocido");
    $pass = strip_tags($pass);
    //Buscamos el usuario en la base de datos en profesor
    $consulta = "SELECT RFC, Correo FROM profesor";
    $respuesta= mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
    //si hay registros, prosigue
    if ($row!=NULL) {
      foreach ($row as $key => $value) {
        //busca coincidencias de usuario
        $user_desc=descifrado($value);
        if ($user_desc==$user) {
          //busca contraseña
          $consulta = "SELECT Contrasena FROM profesor WHERE (RFC='".$value."') OR (Correo='".$value."')";
          $respuesta= mysqli_query($conexion, $consulta);
          $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
          $pass_hash=$row[0];
          //verifica contraseña
          if (password_verify($pass,$pass_hash)) {
            //busca rfc
            $consulta = "SELECT RFC FROM profesor WHERE Contrasena='".$pass_hash."'";
            $respuesta= mysqli_query($conexion, $consulta);
            $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
            $user=$row[0];
            $user=descifrado($user);
            //Iniciamos sesión y almacenamos sus datos
            session_name("ElAullido");
            session_id("3141592653");
            session_start();
            $_SESSION['usuario'] = $user;
            $_SESSION['tipo'] = "profesor";
            echo $user;
            header("Location: ./perfil.php");
          }
          else {
            echo "no contraseña";
          }
        }
      }
    }
    //Buscamos el usuario en la base de datos en alumno
    $consulta = "SELECT NoCuenta, Correo FROM alumno";
    $respuesta= mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
    //si hay registros, prosigue
    if ($row!=NULL) {
      foreach ($row as $key => $value) {
        //busca coincidencias de usuario
        $user_desc=descifrado($value);
        if ($user_desc==$user) {
          $consulta = "SELECT Contrasena FROM alumno WHERE (NoCuenta='".$value."') OR (Correo='".$value."')";
          $respuesta= mysqli_query($conexion, $consulta);
          $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
          $pass_hash=$row[0];
          //verifica contraseña
          if (password_verify($pass,$pass_hash)) {
            //busca numero  de cuenta
            $consulta = "SELECT NoCuenta FROM alumno WHERE Contrasena=".$pass_hash."'";
            $respuesta= mysqli_query($conexion, $consulta);
            $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
            $user=$row[0];
            $user=descifrado($user);
            //Iniciamos sesión y almacenamos sus datos
            session_name("ElAullido");
            session_id("3141592653");
            session_start();
            $_SESSION['usuario'] = $user;
            $_SESSION['tipo'] = "alumno";
            header("Location: ./perfil.php");
          }
          else {
            echo "no contraseña";
          }
        }
        //ningún usuario coincide
        else {
          echo "no usuario";
        }
      }
    }
    else {
      echo "no registros";
    }
  }
  mysqli_close($conexion);
?>
