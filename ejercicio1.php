<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<table border = 1>
<body>

    <?php

$archivo = fopen("archivo.txt", "r");

        while (!feof($archivo)){
    
            $linea = fgets($archivo);
            echo $linea, "<br>";
        }

        fclose($archivo);

        $archivo = fopen("archivo.txt", "a+");

        fwrite($archivo, "\nMarina Aparicio,160,74,brown,fair,green,21,female,Earth,Human");


        while (!feof($archivo)){
    
            $linea = fgets($archivo);
            $division = explode(",", $linea);
            echo "<tr>";
            echo "<td>",$division[0],"<br></td>";
            echo "<td>",$division[1],"<br></td>";
            echo "</tr>";
        }
        

    ?>
</table>
    
</body>
</html>