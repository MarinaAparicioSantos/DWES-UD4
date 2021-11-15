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

function creaConexion(){

    $mysqli = mysqli_connect('localhost', "developer", "developer", "agenciaviajes");
    $error = mysqli_connect_errno();
    if ($error!= null){
        echo "<p>Error $error conectando a la base de datos:",mysqli_error($mysqli),"</p>";
        exit();
    }else{
        echo "conectando correctamente";
        echo"<br>";
    }
        return $mysqli;
}

function creaVuelo($origen, $destino, $fecha, $companya, $modeloavion){

    $mysqli = creaConexion();

    $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, Modeloavion) VALUES (?, ?, ?, ?, ? )";
    $consulta = mysqli_stmt_init($mysqli);

    if ($stmt= mysqli_prepare($mysqli, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino, $fecha, $companya, $modeloavion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

}

//creaVuelo("1","2","2021-10-21","4","5");

function modificaDestino($id, $destino){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "UPDATE `vuelos` SET `Destino` =?    WHERE `id`= ?";
    $consulta = mysqli_stmt_init($mysqli);
    if($stmt = mysqli_prepare($mysqli,$sql)){
        mysqli_stmt_bind_param($stmt, "si", $destino, $id);
        $retorno = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
    mysqli_close($mysqli);
}

//modificaDestino("2","Chipiona");

function modificaCompanya($id, $companya){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "UPDATE `vuelos` SET `Companya` =?    WHERE `id`= ?";
    $consulta = mysqli_stmt_init($mysqli);
    if($stmt = mysqli_prepare($mysqli,$sql)){
        mysqli_stmt_bind_param($stmt, "si", $companya, $id);
        $retorno = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
    mysqli_close($mysqli);

}

//modificaCompanya("4","conchinchina");

function eliminaVuelo($id){

    $mysqli = creaConexion();
    $retorno = false;
    $sql = "DELETE FROM `vuelos` WHERE `id`= ?";
    $consulta = mysqli_stmt_init($mysqli);
    if($stmt = mysqli_prepare($mysqli,$sql)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        $retorno = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
    mysqli_close($mysqli);

}

//eliminaVuelo("7");

function extraeVuelos(){
    $mysqli = creaConexion();
    $sql = "SELECT * FROM vuelos";
    $result = mysqli_query($mysqli, $sql);
    return $result;
}

//creaVuelo("Madrid", "Barcelona", "2021-10-28 14:04:59", "Iberia", "A123");

 $vuelos = extraeVuelos();
while($fila = mysqli_fetch_assoc($vuelos)){

    print_r($fila);
    echo"<br>";
} 
?>

</body>

</html>