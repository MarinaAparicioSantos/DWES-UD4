<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 7</title>
</head>

<body>
    <?php

    function creaConexion()
    {


        $servername = "localhost";
        $username = "developer";
        $password = "developer";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            echo "no funciona";
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";


        creaConexion();






        // @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');

        // $error = mysqli_connect_errno($mysqli);
        // if ($error != null) {
        //     echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error(), "</p>";
        //     exit();

        //     return $mysqli;
        // }
    }

    function creaVuelo($Origen, $Destino, $Fecha, $Companya, $ModeloAvion)
    {
    }

    function modificaDestino($id, $Destino)
    {
    }

    function modificaCompanya($id, $Companya)
    {
    }

    function eliminaVuelos($id)
    {
    }

    function extraeVuelos()
    {
    }
    ?>

</body>

</html>