<?php

$servidor = "localhost";
$baseDatos = "agenciaviajes";
$usuario = "developer";
$pass = "developer";

$conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);

echo "Valores según la posición del parámetro.";
$consulta = $conexion->prepare("SELECT * FROM turista WHERE id=?;");
$id = 7;
$consulta->bindParam(1,$id);
$consulta->execute();
while($fila = $consulta->fetch()){
    print_r($fila);

}
echo "<br>";

echo "Valores según el nombre de la variable.";

echo "<br>";

$consulta = $conexion->prepare("SELECT * FROM turista WHERE id=:id;");
$id = 6;
$consulta->bindParam(":id",$id);
$consulta->execute();
while($fila = $consulta->fetch()){
    print_r($fila);

}

echo "<br>";

echo "Valores en un diccionario con los nombres de las variables.";

echo "<br>";

$consulta = $conexion->prepare("SELECT * FROM turista WHERE id=:id;");
$id = 4;
$parametros = array(":id" => $id);
$consulta->execute($parametros);
while($fila = $consulta->fetch()){
    print_r($fila);

}

$conexion = null;

?>