

<table border = 1>
<?php

// $archivo = fopen("archivo.txt", "r");

// while (!feof($archivo)){
//     $linea = fgets($archivo);
//     echo $linea,"<br>";
// }

// fclose($archivo);

$archivo = fopen("archivo.txt", "a+");



while (!feof($archivo)){
    
    $linea = fgets($archivo);
    echo "<tr>";
    echo "<td>",$linea,"<br></td>";
    echo "</tr>";
}

fwrite($archivo, "\nMarina Aparicio,160,74,brown,fair,green,21,female,Earth,Human");


fclose($archivo);
?>
</table>