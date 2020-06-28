<html>
 <meta charset="utf-8">
  <head>
     <title>
         <?php $titulo=$_POST['Titulo']; echo $titulo; ?>
     </title>
 </head>
 <body>
     <?php

         $NumPreg=$_POST['NPreg'];
         $Pregunta=$_POST['Pregunta'];
         $Tipo=$_POST['Tipo'];
         $NumCerradas=$_POST['NumCerradas'];
         $Cerradas=$_POST['Cerradas'];
         for($h=1;$h<=$Numcerradas;$h++){
             $NumOpciones[$h]=$_POST['NumOpciones'.$h];
             $TOpcion[$h]=$_POST['TOpcion'.$h];
         }

         echo "<form method=POST action=5>";
         for($i=1;$i<=$NumCerradas;$i++){
             echo $Cerradas[$i]."<br />";
             switch($TOpcion[$i]){
                 case "Textos":
                     for($j=1;$j<=$NumOpciones[$i];$j++){
                         echo "<input type=text name=Opciones".$i." /><br />";
                     }
                 break;
                 case "Numeros":
                     for($j=1;$j<=$NumOpciones[$i];$j++){
                         echo "<input type=number name=Opciones".$i." /><br />";
                     }
                 break;
                 case "Imagenes":
                     for($j=1;$j<=$NumOpciones[$i];$j++){
                         echo "<input type=file name=Opciones".$i." /><br />";
                     }
                 break;
             }
         }
         echo "<input name=Titulo type=hidden value=".$titulo." />";
         echo "<input name=NPreg type=hidden value=".$NumPreg." />";
         echo "<input name=NumCerradas type=hidden value=".$NumCerradas." />";
         echo "<input name=Pregunta type=hidden value=".$Pregunta." />";
         echo "<input name=Tipo type=hidden value=".$Tipo." />";
         echo "<input name=Cerradas type=hidden value=".$Cerradas." />";
         echo "<input name=NumOpciones type=hidden value=".$NumOpciones." />";
         echo "<input type=submit value=Continuar />";
         echo "</form>";

         /*for($i=1;$i<=$NumPreg;$i++){
             echo $Pregunta[$i]."<br />";
             switch($Tipo[$i]){
                 case "Texto":
                     echo "<input type=text><br />";
                 break;
                 case "Numero":
                     echo "<input type=number><br />";
                 break;
                 case "Opciones":
                    echo "<select
                 break;
             }
         }*/

     ?>
 </body>
</html>
