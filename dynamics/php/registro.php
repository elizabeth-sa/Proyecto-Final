<?php
  /*$conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
  if( !$conexion ){
    echo mysqli_connect_error();
    exit();
  }
  else*/ if (isset($_POST['registro']) && $_POST['registro'] == "alumno"){
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
    $apm = htmlentities((isset($_POST['apm']) && $_POST['apm'] != " ")? $_POST['apm'] : "Desconocido");
    $apm = strip_tags($apm);
    $correo = htmlentities((isset($_POST['correo']) && $_POST['correo'] != " ")? $_POST['correo'] : "Desconocido");
    $correo = strip_tags($correo);
    $pass = htmlentities((isset($_POST['pass']) && $_POST['pass'] != " ")? $_POST['pass'] : "Desconocido");
    $pass = strip_tags($pass);
    $nombre.=" ".$app." ".$apm;
  }
  else if (isset($_POST['registro']) && $_POST['registro'] == "profesor") {
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
  else {
    header("Location: ../../templates/registro.html");
  }
?>
