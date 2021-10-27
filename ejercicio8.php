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

    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        $sql = "SELECT * FROM turista";
        $turistas = $conexion->query($sql);

        echo "<table border = \"1\">";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Direccion</th>";

        while ($turista = $turistas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";

            echo "<td>";
            echo $turista["nombre"];
            echo "</td>";

            echo "<td>";
            echo $turista["apellido1"];
            echo "</td>";

            echo "<td>";
            echo $turista["direccion"];
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";



        echo "<table border = \"1\">";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Direccion</th>";

        while ($turista = $turistas->fetch(PDO::FETCH_NUM)) {

            $dato1 = $turista[1];
            $dato2 = $turista[2];
            $dato3 = $turista[4];
            echo "<tr>";

            echo "<td>";
            echo $dato1;
            echo "</td>";

            echo "<td>";
            echo $dato2;
            echo "</td>";

            echo "<td>";
            echo $dato3;
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    //$conn = null;
    ?>

</body>

</html>