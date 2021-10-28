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
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Coral','Castro','Ortiz','Alcalá de Guadaira','680799651')";
        $numeroClientes = $conexion->exec($sql);
        $last_id = $conexion->lastInsertId();
        echo "Se han añadido $numeroClientes cliente nuevo con el id: $last_id.";
        echo "<br>";
        $sql = "UPDATE turista SET nombre='Melodia',apellido1='Flores',apellido2='Rosa',direccion='Carmona',telefono='607999451'WHERE id=2 OR id=3";
        $numeroClientesActualizados=$conexion->exec($sql);
        echo "Se han modificado $numeroClientesActualizados clientes.";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    ?>

</body>

</html>