<?php
  //En este php cerramos la sesión, cambiando su id para identificarla
  session_name('ElAullido');
  session_id('0');
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../../index.html");
?>
