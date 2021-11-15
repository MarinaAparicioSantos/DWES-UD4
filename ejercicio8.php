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
        $sql = "SELECT nombre, apellido1, direccion FROM turista";


        function cabeceraWapa()
        {
            echo "<table border = 2>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Dirección</th>";
        }

        cabeceraWapa();
        $turistas = $conexion->query($sql);

        while ($turista = $turistas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>";
            echo $turista['nombre'];
            echo "</td>";

            echo "<td>";
            echo $turista['apellido1'];
            echo "</td>";

            echo "<td>";
            echo $turista['direccion'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        cabeceraWapa();
        $turistas = $conexion->query($sql);

        while ($turista = $turistas->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            echo "<td>";
            echo $turista[0];
            echo "</td>";

            echo "<td>";
            echo $turista[1];
            echo "</td>";

            echo "<td>";
            echo $turista[2];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        cabeceraWapa();
        $turistas = $conexion->query($sql);

        while ($turista = $turistas->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>";
            echo "<td>";
            echo $turista[0];
            echo "</td>";
            echo "<td>";
            echo $turista[1];
            echo "</td>";
            echo "<td>";
            echo $turista[2];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        cabeceraWapa();
        $turistas = $conexion->query($sql);

        while ($turista = $turistas->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>";
            echo $turista->nombre;
            echo "</td>";
            echo "<td>";
            echo $turista->apellido1;
            echo "</td>";
            echo "<td>";
            echo $turista->direccion;
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        cabeceraWapa();
        $turistas = $conexion->query($sql);

        while ($turista = $turistas->fetch(PDO::FETCH_LAZY)) {
            echo "<tr>";
            echo "<td>";
            echo $turista['nombre'];
            echo "</td>";

            echo "<td>";
            echo $turista['apellido1'];
            echo "</td>";

            echo "<td>";
            echo $turista['direccion'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        cabeceraWapa();
        $turistas = $conexion->query($sql); // FETCH_BOUND USA BIND COLUMNS¿? ¿?¿?¿' XD WT

        $turistas->execute();
        $turistas->bindColumn(1, $nombre);
        $turistas->bindColumn(2, $apellido1);
        $turistas->bindColumn(3, $direccion);



        while ($fila = $turistas->fetch(PDO::FETCH_BOUND)) {

            echo "<tr>";
            echo "<td>" . $nombre . "</td>";
            echo "<td>" . $apellido1 . "</td>";
            echo "<td>" . $direccion . "</td>";
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