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

function creaConexion(){

    $mysqli = new mysqli('localhost', "developer", "developer", "agenciaviajes");
    $error = $mysqli -> connect_errno;
    if ($error!= null){
        echo "<p>Error $error conectando a la base de datos:",$mysqli -> connect_error,"</p>";
        exit();
    }else{
        echo "conectando correctamente";
        echo"<br>";
    }
        return $mysqli;
}

function creaVuelo($origen, $destino, $fecha, $companya, $modeloavion){
    $retorno = false;
    $mysqli = creaConexion();

    $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, Modeloavion) VALUES (?, ?, ?, ?, ? )";
    $mysqli->stmt_init();

    if ($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("sssss", $origen, $destino, $fecha, $companya, $modeloavion);
        $stmt->execute();
        $stmt->close();
    }
    $mysqli -> close();
}

//creaVuelo("10", "20", "2021-10-28", "40", "50");

function modificaDestino($id, $destino){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "UPDATE `vuelos` SET `Destino` =?    WHERE `id`= ?";
    $mysqli->stmt_init();

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("si", $destino, $id);
        $stmt->execute();
        $stmt->close();

    }
    //$mysqli -> close($mysqli);
    $mysqli -> close();
    return $retorno;
}

//modificaDestino("18","hola");

function modificaCompanya($id, $companya){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "UPDATE `vuelos` SET `Companya` =? WHERE `id`= ?";
    $mysqli->stmt_init();
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("si", $companya, $id);
        $stmt->execute();
        $stmt->close();

    }
    //$mysqli -> close($mysqli);
    $mysqli -> close();
    return $retorno;

}

//modificaCompanya("19","adios");

function eliminaVuelo($id){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "DELETE FROM `vuelos` WHERE `id`= ?";
    $mysqli->stmt_init();
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

    }
    //$mysqli -> close($mysqli);
    $mysqli -> close();
    return $retorno;

}

//eliminaVuelo("15");

function extraeVuelos(){
    $mysqli = creaConexion();
    $sql = "SELECT * FROM vuelos";
    $result = mysqli_query($mysqli, $sql);
    return $result;
}



$vuelos = extraeVuelos();
while($fila = $vuelos -> fetch_assoc()){

    print_r($fila);
    echo"<br>";
}
?>

</body>

</html>