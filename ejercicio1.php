<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<table border = "1">
<body>

    <?php

$archivo = fopen("archivo.txt", "r");

       /*  while (!feof($archivo)){
    
            $linea = fgets($archivo);
            echo $linea, "<br>";
        }

        fclose($archivo);

        $archivo = fopen("archivo.txt", "a+");

        fwrite($archivo, "\nMarina Aparicio,160,74,brown,fair,green,21,female,Earth,Human");


        while (feof($file) != true) {
            echo ("<tr>");
            $personaje = fgets($file);
            echo ("<td> $personaje</td>");
            echo ("</tr>");
        } */


        $file = fopen("archivo.txt", "r");

        echo ("<table border = 2");
        while (feof($file) != true) {
            echo ("<tr>");
            $personaje = fgets($file);
            echo ("<td> $personaje</td>");
            echo ("</tr>");
        }
    
    
        fclose($file);
    
        $file = fopen("personajes.txt", "a+");
        fwrite($archivo, "\nMarina Aparicio,160,74,brown,fair,green,21,female,Earth,Human");
        fclose($file);


        
        

    ?>
</table>
    
</body>
</html>