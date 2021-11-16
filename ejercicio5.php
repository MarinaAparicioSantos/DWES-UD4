<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 5</title>
</head>
<body>
    

<?php

//estilo procesal

@$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

$error = mysqli_connect_errno();
if($error!=null){
    echo "<p>Error $error conectando a la base de datos:",mysqli_connect_error(),"</p>";
    exit();
}

$result = mysqli_query($mysqli,"INSERT INTO vuelos (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES ('Madrid', 'Valencia', '2021-10-21 09:16:52', 'Iberia','A380')");
if($result == false){

    echo "La consulta no ha funcionado correctamente.<br>";
}
else{
    echo "Se han insertado",mysqli_affected_rows($mysqli),"filas";
    echo "<br>";
    echo "El id del último elemento añadido es ",mysqli_insert_id($mysqli),"<br>";
}

mysqli_close($mysqli);



@$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

$error = mysqli_connect_errno();
if($error!=null){
    echo "<p>Error $error conectando a la base de datos:",mysqli_connect_error(),"</p>";
    exit();
}

$result = mysqli_query($mysqli,"UPDATE `vuelos` SET `Origen`='Pamplona' WHERE `id`='1'");

if($result == false){

    echo "La consulta no ha funcionado correctamente.<br>";
}
else{
    echo "Se han actualizado ",mysqli_affected_rows($mysqli)," filas<br>";
   
}

mysqli_close($mysqli);



@$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');
$error = mysqli_connect_errno();

if($error !=null){
    echo "<p>Error $error conectando a la base de datos:",mysqli_connect_error(),"</p>";
    exit();
}

$result = mysqli_query($mysqli, "DELETE FROM  `vuelos` WHERE id='1'");
if($result==false){
    echo "La consulta no ha funcionado correctamente.<br>";
}
else{

    echo "Se han borrado ",mysqli_affected_rows($mysqli), " filas.<br>";
}
mysqli_close($mysqli);

?>

</body>
</html>