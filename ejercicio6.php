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
            
            @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');

            $error = mysqli_connect_errno($mysqli);
            if($error!=null){
                echo "<p>Error $error conectando a la base de datos:",mysqli_connect_error(),"</p>";
                exit();

                return $mysqli;
            }

        }


        function creaVuelo($Origen, $Destino, $Fecha, $Companya, $ModeloAvion, $id){


            $result = mysqli_query($mysqli,"INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES ('Madrid', 'Valencia', '2021-10-21 09:16:52', 'Iberia','A380')");
        }

        function modificaDestino($id, $Destino){


        }

        function modificaCompanya($id, $Companya){


        }

        function eliminaVuelos($id){


        }

        function extraeVuelos(){


        }


    ?>
    
</body>
</html>