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
        <!--Botones para cerrar sesión-->
        <button type="button" class="botoncito" id="cerrar" name="button">Cerrar Sesión</button>
      </div>
    </nav>
    <?php
      //incluímos archivo de configuración
      include_once './configuracion.php';

      $conexion = mysqli_connect(local, usuario, contrasena, nombre);
      if( !$conexion ){
        echo mysqli_connect_error();
        exit();
      }
      else {
        session_name("ElAullido");
        session_id("3141592653");
        session_start();
      }
    ?>
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
              $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : 'Desconocido';
              $consulta = "SELECT Nombre FROM alumno WHERE NoCuenta = '".$usuario."'";
              $respuesta= mysqli_query($conexion, $consulta);
              $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
              $row[0]=descifrado($row[0]);
              echo $row[0];
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
              $nombre = (isset($_SESSION['nombre']))? $_SESSION['nombre'] : 'Desconocido';
              $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : 'Desconocido';
              echo $nombre;
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
              echo "owo";
            ?>
          </p>
        </div>
        <!--La información de las encuestas esta en una sección-->
        <section>
          <div class="encuestas" id="elaboradas">
            <h3>Encuestas elaboradas</h3>
            <h2>
              <?php
                echo "owo";
              ?>
            </h2>
          </div>
          <div class="encuestas" id="contestadas">
            <h3>Encuestas contestadas</h3>
            <h2>
              <?php
                echo "owo";
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
