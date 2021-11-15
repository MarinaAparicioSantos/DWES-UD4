<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php //revisar
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    $id1 = 2;

    $conexion = crearConexion($servidor, $baseDatos, $usuario, $pass);

    $nombre = "Iñigo";
    $apellido1 = "Montoya";
    $apellido2 = "Tu";
    $direccion = "hawaii";
    $telefono = "111111111";


    $id = crearTurista($conexion, $nombre, $apellido1, $apellido2, $direccion, $telefono);
    if ($id < 1) {
        echo "Ha habido un error al crear el Turista";
        echo "<br>";
    } else {
        echo "Se ha creado con exito al turista con id $id";
        echo "<br>";
    }

    $turistaExtraido = extraeTurista($conexion, $id1);
    print_r($turistaExtraido);


    $resultadoExtraerTuristas = extraeTuristas($conexion);
    if ($resultadoExtraerTuristas == false) {
        echo "Error al mostrar los datos";
        echo "<br>";
    } else {
        echo "<table border=1px>";
        echo "<tr> ";
        echo "<td>id</td>";
        echo "<td>nombre</td>";
        echo "<td>apellido1</td>";
        echo "<td>apellido2</td>";
        echo "<td>direccion</td>";
        echo "<td>telefono</td>";
        echo "</tr> ";

        foreach ($resultadoExtraerTuristas as $turista) {
            echo "<tr> ";
            echo "<td>$turista[id]</td>";
            echo "<td>$turista[nombre]</td>";
            echo "<td>$turista[apellido1]</td>";
            echo "<td>$turista[apellido2]</td>";
            echo "<td>$turista[direccion]</td>";
            echo "<td>$turista[telefono]</td>";
            echo "</tr> ";
        }
        echo "</table>";
        echo "<br>";
    }

    $direccion = "Teruel";
    $telefono = "123456789";
    $id = 2;
    $resultadoActualizaTurista = actualizaTurista($conexion, $id, $direccion, $telefono);
    if ($resultadoActualizaTurista) {
        echo "El turista con id $id se ha actualizado correctamente.";
        echo "<br>";
    } else {
        echo "Error al actualizar";
        echo "<br>";
    }

    $id = 6;
    $resultadoEliminarTurista = eliminaTurista($conexion, $id);
    if ($resultadoEliminarTurista) {
        echo "El turista con id $id se ha eliminado correctamente.";
        echo "<br>";
    } else {
        echo "Error al eliminar";
        echo "<br>";
    }

    $conexion = null;

    function crearConexion($servidor, $baseDatos, $usuario, $pass)
    {
        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            return $conexion;
        } catch (PDOException $e) {
            return false;
        }
    }

    function crearTurista($conexion, $nombre, $apellido1, $apellido2, $direccion, $telefono)
    {
        try {
            $consulta = $conexion->prepare("INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES (?,?,?,?,?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $apellido1);
            $consulta->bindParam(3, $apellido2);
            $consulta->bindParam(4, $direccion);
            $consulta->bindParam(5, $telefono);
            $consulta->execute();
            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    function extraeTurista($conexion, $id)
    {
        try {
            $consulta = $conexion->prepare("SELECT * FROM turista WHERE id=:id");
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            return $consulta->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    function extraeTuristas($conexion)
    {
        try {
            /*$sql="SELECT * FROM turista"; 
                return $conexion->query($sql);*/
            $consulta = $conexion->prepare("SELECT * FROM turista");
            $consulta->execute();
            $array = [];
            while ($fila = $consulta->fetch(PDO::FETCH_BOTH)) {
                $array[] = $fila;
            }
            return $array;
        } catch (PDOException $e) {
            return false;
        }
    }

    function actualizaTurista($conexion, $id, $direccion, $telefono)
    {
        try {
            $consulta = $conexion->prepare("UPDATE turista SET direccion=:direccion, telefono=:telefono WHERE id=:id");
            $parametros = array(":direccion" => $direccion, ":telefono" => $telefono, ":id" => $id);
            return $consulta->execute($parametros);
        } catch (PDOException $e) {
            return false;
        }
    }

    function eliminaTurista($conexion, $id)
    {
        try {
            $consulta = $conexion->prepare("DELETE FROM turista WHERE id=:id");
            $parametros = array(":id" => $id);
            return $consulta->execute($parametros);
        } catch (PDOException $e) {
            return false;
        }
    }
    ?>
</body>

</html>