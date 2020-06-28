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
         $Cerradas;
         $NumCerradas=0;
         for($i=1;$i<=$NumPreg;$i++){
             $Pregunta[$i]=$_POST['Pregunta'.$i];
             $Tipo[$i]=$_POST['Tipo'.$i];
             if($Tipo[$i]=="Opciones"){
                 $NumCerradas++;
                 $Cerradas[$NumCerradas]=$Pregunta[$i];
             }
         }
         if($NumCerradas>0){
             echo "<form method=POST action=4>";
             for($j=1;$j<=$NumCerradas;$j++){
                 echo $Cerradas[$j]."<br />";
                 echo "Con cuantas opciones contara?: <input type=text name=NumOpciones".$j." /><br />";
                  echo "<select name=TOpcion".$j." >";
                  echo "<option value=Textos>Texto</option>";
                  echo "<option value=Numeros>Numeros</option>";
                  echo "<option value=Imagenes>Imagenes</option>";
                  echo "</select>";
             }
             echo "<input name=Titulo type=hidden value=".$titulo." />";
             echo "<input name=NPreg type=hidden value=".$NumPreg." />";
             echo "<input name=NumCerradas type=hidden value=".$NumCerradas." />";
             echo "<input name=Pregunta type=hidden value=".$Pregunta." />";
             echo "<input name=Tipo type=hidden value=".$Tipo." />";
             echo "<input name=Cerradas type=hidden value=".$Cerradas." />";
             echo "<input type=submit value=Siguiente />";
             echo "</form>";
         }


      ?>
  </body>
</html>
