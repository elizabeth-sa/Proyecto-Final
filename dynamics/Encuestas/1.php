<html>
  <meta charset="utf-8">
    <head>
        <title>
            Crear Encuesta
        </title>
    </head>
    <body>
        <?php
            echo "<h1>
                    Crea tu propia encuesta
                  </h1>
                  <br><br>
                  <form method=POST action=2.php>
                  Cual es el titulo de tu encuesta?: <input type=text name=Titulo>
                  <br><br>
                  Cuantas preguntas tendra?: <input type=number name=NPreg />
                  <br><br>
                  <input type=submit value=Continuar />
                  </form>";
        ?>
    </body>
</html>
