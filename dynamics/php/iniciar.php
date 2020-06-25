<?php
  session_name("ElAullido");
  session_id("3141592653");
  session_start();
  $_SESSION['nombre'] = "pepito";
  $_SESSION['usuario'] = "pepitoso";
  header("Location: ../../templates/perfil.html");
?>
