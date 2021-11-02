<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<table border = "1">
<body>

    <?php

        // $archivo = fopen("locations.csv", "r");

        // while (!feof($archivo)){
    
        //     $linea = fgets($archivo);
        //     echo $linea, "<br>";
        // }

        // fclose($archivo);

        $archivo = fopen("locations.csv", "r+");

        fwrite($archivo, "\nEsfinge, \"31.1376800,29.9752700\"\n");

        echo "<tr>";
        echo "<td>Localización</td>\n";
        echo "<td>Latitud</td>\n";
        echo "</tr>";

        if ($archivo !== FALSE) {
            while (($datos = fgetcsv($archivo,0,",")) !== FALSE) {

                    echo "<tr>";
                    echo "<td>",$datos[0] . "</td>\n";
                    echo "<td>",$datos[1] . "</td>\n";
                    echo "</tr>";
                
            }
            fclose($archivo);
        }
    ?>
</table>  
</body>
</html>