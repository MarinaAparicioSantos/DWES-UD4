<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 6</title>
</head>

<body>

    <?php

    function creaConexion()
    {

        @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');

        $error = mysqli_connect_errno($mysqli);
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error(), "</p>";
            exit();

            return $mysqli;
        }
    }


    function creaVuelo($Origen, $Destino, $Fecha, $Companya, $ModeloAvion)
    {

        $mysqli = creaConexion();
        $sql = "INSERT INTO `vuelos` (Origen,Destino,Fecha,Companya,ModeloAvion) VALUES (?,?,?,?,?)";
        $consulta = mysqli_stmt_init($mysqli);

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $Origen, $Destino, $Fecha, $Companya, $ModeloAvion);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
    }

    function modificaDestino($id, $Destino)
    {
        $mysqli = creaConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Destino` = ? WHERE `id` = ?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {

            mysqli_stmt_bind_param($stmt, "si", $Destino, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_close($mysqli);
        return $retorno;
    }

    function modificaCompanya($id, $Companya)
    {

        $mysqli = creaConexion();
        $retorno = false;
        $sql = "UPDATE `vuelos` SET `Companya` = ? WHERE `id` = ?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {

            mysqli_stmt_bind_param($stmt, "si", $Companya, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_close($mysqli);
        return $retorno;
    }

    function eliminaVuelos($id)
    {

        $mysqli = creaConexion();
        $retorno = false;

        $sql = "DELETE FROM `vuelos` WHERE `id` = ?";

        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_close($mysqli);
        return $retorno;
    }

    function extraeVuelos()
    {

        $mysqli = creaConexion();
        $sql = "SELECT * FROM vuelos";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }


    ?>

</body>

</html>