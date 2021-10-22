<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');
        $error = mysqli_connect_errno($mysqli);
        if ($error!=null){

            echo "<p>Error $error conectando a la base de datos:",mysqli_connect_error($mysqli),"</p>";
            exit();
        }else{
            echo "conectando correctamente";
            echo "<br>";
        }
        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        var_export($result);

        $result= mysqli_query($mysqli, "SELECT * FROM `vuelos`");
        if($result == false){
            echo "La consulta no ha funcionado correctamente.";
        }else{
            while($fila = mysqli_fetch_assoc($result)){
                print_r($fila);
                echo "<br>";
            }

            echo "<table border = \"1\">";
            echo "<tr>";

            echo "<td>Origen</td>";
            echo "<td>Destino</td>";
            echo "<td>Fecha</td>";
            echo "<td>Companya</td>";
            echo "<td>ModeloAvion</td>";
            echo "<td>id</td>";


            echo "<tr>";


            foreach($fila as &$tabla){

                echo "<tr>";

                echo "<td>$tabla[Origen]</td>";
                echo "<td>$tabla[Destino]</td>";
                echo "<td>$tabla[Fecha]</td>";
                echo "<td>$tabla[Companya]</td>";
                echo "<td>$tabla[ModeloAvion]</td>";
                echo "<td>$tabla[id]</td>";


                echo "<tr>";


            }
            echo "</table>";
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>