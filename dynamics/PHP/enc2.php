<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Encuesta</title>
    <link rel="icon" href="../../statics/media/logo_lobo.png">
  </head>
  <body>
    <form action="encf.php" method="post">
      <table border="0">
        <?php
        $titulo=$_POST['titulo'];
        $preguntas=$_POST['preguntas'];
        echo $titulo;
        for($i=1;$i<=$preguntas;$i++){
          ?>
          <tr>
            <td>Pregunta <?php echo $i; ?></td>
            <td><input name="p<?php echo $i;?>" type="text" size="50" maxlength="50"></td>
            <td>Tipo: <select name='tipo<?php echo $i;?>'>
              <option value='Numeros'>Numerica</option>
              <option value='Texto'>Texto libre</option>
              <option value='Opciones'>Opciones</option><br>
            </select></td>
          </tr>
        <?php } ?>
      </table>
      <input name="titulo" type="hidden" value="<?php echo $titulo;?>">
      <input type="hidden" name="preguntas" value="<?php echo $preguntas;?>">
      <input type="submit" name="Submit" value="Enviar"></p>
    </form>
  </body>
</html>
