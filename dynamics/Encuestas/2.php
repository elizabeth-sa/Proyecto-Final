<html>
  <meta charset="utf-8">
    <head>
        <title>
            <?php $titulo=$_POST['Titulo']; echo $titulo;  ?>
        </title>
    </head>
    <body>
        <?php

           $NumPreg=$_POST['NPreg'];
           echo "<h1>Preguntas</h1><br />";
           echo "<br />";
           echo "<form method=POST action=3.?><?php/>";
           for($i=1;$i<=$NumPreg;$i++){
               echo "Digite su pregunta: <input type=text name=Pregunta".$i." /> ";
               echo "<select name=Tipo".$i." />";
               echo "<option value=Texto>Abierta</option>";
               echo "<option value=Numero>Numerica</option>";
               echo "<option value=Opciones>Cerrada</option>";
               echo "</select>";
           }
           echo "<input name=Titulo type=hidden value=".$titulo." />";
           echo "<input name=NPreg type=hidden value=".$NumPreg." />";
           echo "<input type=submit value=Listo />";
           echo "</form>";

        ?>
    </body>
</html>
