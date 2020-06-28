<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Aullido</title>
    <!--Librería de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!--Enlace de google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <!--Hoja de diseño-->
    <link rel="stylesheet" href="../../statics/css/perfil.css">
  </head>
  <body>
    <?php
      //incluímos archivo de configuración
      include_once './configuracion.php';

      function consulta_p($dato){


      }

      $conexion = mysqli_connect(local, usuario, contrasena, nombre);
      if( !$conexion ){
        echo mysqli_connect_error();
        exit();
      }
      else {
        session_name("ElAullido");
        session_id("3141592653");
        session_start();
        $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : 'Desconocido';
        $consulta = "SELECT NoCuenta FROM alumno";
        $respuesta= mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
        if ($row!=NULL) {
          foreach ($row as $key => $value) {
            $cuenta=descifrado($value);
            if ($usuario==$cuenta) {
              $tabla="alumno";
            }
          }
          if (isset($tabla)==FALSE) {
            $tabla="profesor";
          }
        }
        else {
          $tabla="profesor";
        }
        if ($tabla=="profesor") {
          $consulta = "SELECT RFC FROM profesor";
          $respuesta= mysqli_query($conexion, $consulta);
          $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
          foreach ($row as $key => $value) {
            if (descifrado($value)==$usuario) {
              $cuentoso=$value;
            }
          }
        }
        else {
          $consulta = "SELECT NoCuenta FROM alumno";
          $respuesta= mysqli_query($conexion, $consulta);
          $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
          foreach ($row as $key => $value) {
            if (descifrado($value)==$usuario) {
              $cuentoso=$value;
            }
          }
        }
      }
    ?>
    <nav>
      <!--Botones para redirigir a distintos lugares-->
      <div id="izquierda">
        <button type="button" class="botoncito" id="icono" name="button">Icono</button>
        <button type="button" class="botoncito" id="perfil" name="button">Perfil</button>
        <button type="button" class="botoncito" id="crear" name="button">Crear</button>
        <button type="button" class="botoncito" id="contestar" name="button">Contestar</button>
        <button type="button" class="botoncito" id="reportar" name="button">Reportar</button>
        <button type="button" class="botoncito" id="creditos" name="button">Créditos</button>
      </div>
      <div id="derecha">

          <?php
            $consulta = "SELECT Administrador FROM profesor WHERE RFC = '".$cuentoso."'";
            $respuesta= mysqli_query($conexion, $consulta);
            $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
            if ($row!=NULL && $row[0]=="Si") {
              echo '<button type="button" class="botoncito" id="encuesta" name="button">Perfiles</button>';
              echo '<button type="button" class="botoncito" id="administrar" name="button">Encuestas</button>';
            }
          ?>

        <!--Botones para cerrar sesión-->
        <button type="button" class="botoncito" id="cerrar" name="button">Cerrar Sesión</button>
      </div>
    </nav>
    <div id="contenido">
      <aside id="foto">
        <img src="../../statics/media/profile.jpg" alt="perfil">
      </aside>
      <aside id="datos">
        <!--Cada dato expuesto esta separado por un "renglón"-->
        <div class="renglon">
          <div class="respuesta_r">
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
          <label>Nombre:</label>
          </div>
          <p class="input">
            <?php
            if ($tabla=="profesor") {
              $consulta = "SELECT RFC, Nombre FROM profesor WHERE RFC = '".$cuentoso."'";
              $respuesta= mysqli_query($conexion, $consulta);
              $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
              foreach ($row as $key => $value) {
                $cuenta=descifrado($value);
                if ($usuario==$cuenta) {
                  $nombre=$row[$key+1];
                }
              }
              $nombre= descifrado($nombre);
              echo $nombre;
            }
            else if ($tabla=="alumno") {
              $consulta = "SELECT NoCuenta, Nombre FROM alumno WHERE NoCuenta = '".$cuentoso."'";
              $respuesta= mysqli_query($conexion, $consulta);
              $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
              foreach ($row as $key => $value) {
                $cuenta=descifrado($value);
                if ($usuario==$cuenta) {
                  $nombre=$row[$key+1];
                }
              }
              $nombre= descifrado($nombre);
              echo $nombre;
            }
            ?>
          </p>
        </div>
        <!--Cada dato expuesto esta separado por un "renglón"-->
        <div class="renglon">
          <div class="respuesta_r">
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
          <label>Fecha de nacimiento:</label>
          </div>
          <p class="input">
            <?php
              if ($tabla=="profesor") {
                $consulta = "SELECT RFC, FechaNac FROM profesor WHERE RFC = '".$cuentoso."'";
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                $cuenta=0;
                foreach ($row as $key => $value) {
                  if (strlen($value)!=10) {
                    $cuenta=descifrado($value);
                    if ($usuario==$cuenta) {
                      $llave=$key;
                    }
                  }
                }
                $fecha = $llave+1;
                $nombre= ($row[$fecha]);
                echo $nombre;
              }
              else if ($tabla=="alumno") {
                $consulta = "SELECT NoCuenta, FechaNac FROM alumno WHERE NoCuenta = '".$cuentoso."'";
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                $cuenta=0;
                foreach ($row as $key => $value) {
                  if (strlen($value)!=10) {
                    $cuenta=descifrado($value);
                    if ($usuario==$cuenta) {
                      $llave=$key;
                    }
                  }
                }
                $fecha = $llave+1;
                $nombre= ($row[$fecha]);
                echo $nombre;
              }
            ?>
          </p>
        </div>
        <!--Cada dato expuesto esta separado por un "renglón"-->
        <div class="renglon">
          <div class="respuesta_r">
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
          <label>Correo electrónico:</label>
          </div>
          <p class="input">
            <?php
              if ($tabla=="profesor") {
                $consulta = "SELECT RFC, Correo FROM profesor WHERE RFC = '".$cuentoso."'";
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                foreach ($row as $key => $value) {
                  $cuenta=descifrado($value);
                  if ($usuario==$cuenta) {
                    $nombre=$row[$key+1];
                  }
                }
                $nombre= descifrado($nombre);
                echo $nombre;
              }
              else if ($tabla=="alumno") {
                $consulta = "SELECT NoCuenta, Correo FROM alumno WHERE NoCuenta = '".$cuentoso."'";
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                foreach ($row as $key => $value) {
                  $cuenta=descifrado($value);
                  if ($usuario==$cuenta) {
                    $nombre=$row[$key+1];
                  }
                }
                $nombre= descifrado($nombre);
                echo $nombre;
              }
            ?>
          </p>
        </div>
        <!--La información de las encuestas esta en una sección-->
        <section>
          <div class="encuestas" id="elaboradas">
            <h3>Encuestas elaboradas</h3>
            <h2>
              <?php
                if ($tabla=="profesor") {
                  $consulta = "SELECT RFC, Elaboradas FROM profesor WHERE RFC = '".$cuentoso."'";
                  $respuesta= mysqli_query($conexion, $consulta);
                  $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                  $cuenta=0;
                  foreach ($row as $key => $value) {
                    if (strlen($value)!=10) {
                      $cuenta=descifrado($value);
                      if ($usuario==$cuenta) {
                        $llave=$key;
                      }
                    }
                  }
                  $fecha = $llave+1;
                  $nombre= ($row[$fecha]);
                  echo $nombre;
                }
                else if ($tabla=="alumno") {
                  $consulta = "SELECT NoCuenta, Elaboradas FROM alumno WHERE NoCuenta = '".$cuentoso."'";
                  $respuesta= mysqli_query($conexion, $consulta);
                  $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                  $cuenta=0;
                  foreach ($row as $key => $value) {
                    if (strlen($value)!=10) {
                      $cuenta=descifrado($value);
                      if ($usuario==$cuenta) {
                        $llave=$key;
                      }
                    }
                  }
                  $fecha = $llave+1;
                  $nombre= ($row[$fecha]);
                  echo $nombre;
                }
              ?>
            </h2>
          </div>
          <div class="encuestas" id="contestadas">
            <h3>Encuestas contestadas</h3>
            <h2>
              <?php
                if ($tabla=="profesor") {
                  $consulta = "SELECT RFC, Contestadas FROM profesor WHERE RFC = '".$cuentoso."'";
                  $respuesta= mysqli_query($conexion, $consulta);
                  $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                  $cuenta=0;
                  foreach ($row as $key => $value) {
                    if (strlen($value)!=10) {
                      $cuenta=descifrado($value);
                      if ($usuario==$cuenta) {
                        $llave=$key;
                      }
                    }
                  }
                  $fecha = $llave+1;
                  $nombre= ($row[$fecha]);
                  echo $nombre;
                }
                else if ($tabla=="alumno") {
                  $consulta = "SELECT NoCuenta, Contestadas FROM alumno WHERE NoCuenta = '".$cuentoso."'";
                  $respuesta= mysqli_query($conexion, $consulta);
                  $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                  $cuenta=0;
                  foreach ($row as $key => $value) {
                    if (strlen($value)!=10) {
                      $cuenta=descifrado($value);
                      if ($usuario==$cuenta) {
                        $llave=$key;
                      }
                    }
                  }
                  $fecha = $llave+1;
                  $nombre= ($row[$fecha]);
                  echo $nombre;
                }
                mysqli_close($conexion);
              ?>
            </h2>
          </div>
        </section>
      </aside>
    </div>
    <!--En el pie de página hay un icono que sirve de botón para desplegar instrucciones-->
    <footer>
      <i class="fas fa-question-circle  fa-3x" id="symbol"></i>
      <div id="copy">
        <i class="far fa-copyright" ></i>
        <p>Copyright</p>
      </div>
    </footer>
    <script src="../js/perfil.js"></script>
  </body>
</html>
