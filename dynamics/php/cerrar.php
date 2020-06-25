<?php
  session_name('ElAullido');
  session_id('0');
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../../index.html");
?>
