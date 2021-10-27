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
        @$mysqli = new mysqli('localhost', 'developer', 'developer', 'agenciaviajes');

        $error = $mysqli->connect_errno;
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos:", $mysqli->connect_errno, "</p>";
            exit();

            return $mysqli;
        }
    }

    function creaVuelo($Origen, $Destino, $Fecha, $Companya, $ModeloAvion)
    {

        $retorno = false;
        $mysqli = creaConexion();
        $sql = "INSERT INTO `vuelos` (Origen,Destino,Fecha,Companya,ModeloAvion) VALUES (?,?,?,?,?)";
        $consulta = $mysqli->stmt_init();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssss", $Origen, $Destino, $Fecha, $Companya, $ModeloAvion);
            $retorno = $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
        return $retorno;
    }

    function modificaDestino($id, $Destino)
    {


        $mysqli = creaConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Destino` = ? WHERE `id` = ?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("si", $Destino, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }

        $mysqli->close();
        return $retorno;
    }

    function modificaCompanya($id, $Companya)
    {

        $mysqli = creaConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Companya` = ? WHERE `id` = ?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("si", $Companya, $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }

        $mysqli->close();
        return $retorno;
    }

    function eliminaVuelos($id)
    {

        $mysqli = creaConexion();
        $retorno = false;

        $sql = "DELETE FROM `vuelos` WHERE `id` = ?";

        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("i", $id);
            $retorno = $stmt->execute();
            $stmt->close();
        }

        $mysqli->close();
        return $retorno;
    }

    function extraeVuelos()
    {

        $mysqli = creaConexion();
        $sql = "SELECT * FROM vuelos";
        $result = $mysqli->query($sql);
        return $result;
    }
    ?>

</body>

</html>