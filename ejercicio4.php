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

        $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
        if($result == false){
            echo "La consulta no ha funcionado correctamente.";
        }else{

            echo "<table border = \"1\">";

            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Companya</th>";
            echo "<th>ModeloAvion</th>";
            echo "<th>id</th>";

            while($fila = mysqli_fetch_assoc($result)){
                echo "<tr>";

                    echo "<td>";
                    echo $fila["Origen"];
                    echo "</td>";

                    echo "<td>";
                    echo $fila["Destino"];
                    echo "</td>";

                    echo "<td>";
                    echo $fila["Fecha"];
                    echo "</td>";

                    echo "<td>";
                    echo $fila["Companya"];
                    echo "</td>";

                    echo "<td>";
                    echo $fila["ModeloAvion"];
                    echo "</td>";

                    echo "<td>";
                    echo $fila["id"];
                    echo "</td>";

                echo "</tr>";
                
            }

            echo "</table>";

            mysqli_close($mysqli);

            @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");

            echo "<table border = \"1\">";

            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Companya</th>";
            echo "<th>ModeloAvion</th>";
            echo "<th>id</th>";

            $fila = mysqli_fetch_Object($result);
            while ($fila = mysqli_fetch_Object($result)){

                echo "<tr>";

                    echo "<td>";
                    printf("%s",$fila->Origen);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila->Destino);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila->Fecha);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila->Companya);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila->ModeloAvion);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila->id);
                    echo "</td>";

                echo "</tr>";

            }
            echo "</table>";
     
            mysqli_close($mysqli);

            @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");

            echo "<table border = \"1\">";

            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Companya</th>";
            echo "<th>ModeloAvion</th>";
            echo "<th>id</th>";

            $fila = mysqli_fetch_Array($result);
            while ($fila = mysqli_fetch_Array($result)){

                echo "<tr>";

                    echo "<td>";
                    printf("%s ",$fila[0]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[1]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[2]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[3]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[4]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[5]);
                    echo "</td>";

                echo "</tr>";

            }
            echo "</table>";
    
            mysqli_close($mysqli);

            @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");

            echo "<table border = \"1\">";

            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Companya</th>";
            echo "<th>ModeloAvion</th>";
            echo "<th>id</th>";

            $fila = mysqli_fetch_row($result);
            while ($fila = mysqli_fetch_row($result)){

                echo "<tr>";

                    echo "<td>";
                    printf("%s ",$fila[0]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[1]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[2]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[3]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[4]);
                    echo "</td>";
                    echo "<td>";
                    printf("%s",$fila[5]);
                    echo "</td>";

                echo "</tr>";

            }
            echo "</table>";

            mysqli_close($mysqli);

        }
    ?>
</body>
</html>