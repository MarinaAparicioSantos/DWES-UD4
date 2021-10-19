<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<table border="1">
<?php

    $archivo = fopen("archivoXml.xml", "r");

    $informacion = simplexml_load_file("archivoXml.xml");

    $mybook=$informacion->addChild("book");
    $mybook->addAttribute("id","2233");
    $mybook->addChild("author","marina");
    $mybook->addChild("title","bajo la misma estrella");
    $mybook->addChild("genre","romance");
    $mybook->addChild("price","16");
    $mybook->addChild("publish_date","2016-05-31");
    $mybook->addChild("description","dos personas que se enfrentan al cáncer se enamoran");
    $informacion ->asXML("archivoXml.xml");

    

    printf("Autor: %s<br>",$informacion->book[1]->author);
    printf("Titulo: %s<br>",$informacion->book[1]->title);
    printf("Genero: %s<br>",$informacion->book[1]->genre);
    printf("Precio: %s<br>",$informacion->book[1]->price);
    printf("Fecha: %s<br>",$informacion->book[1]->publish_date);
    printf("Descripcion: %s<br>",$informacion->book[1]->description);

    echo "<tr>";
    echo '<td>Autor<br></td>';
    echo '<td>Titulo<br></td>';
    echo '<td>Genero<br></td>';
    echo '<td>Precio<br></td>';
    echo '<td>Fecha<br></td>';
    echo '<td>Descripcion<br></td>';
    echo "</tr>";

    foreach ($informacion as $usuario){
        echo "<tr>";
        echo '<td>'.$usuario->author.'<br></td>';
        echo '<td>'.$usuario->title.'<br></td>';
        echo '<td>'.$usuario->genre.'<br></td>';
        echo '<td>'.$usuario->price.'<br></td>';
        echo '<td>'.$usuario->publish_date.'<br></td>';
        echo '<td>'.$usuario->description.'<br></td>';
        echo "</tr>";
    
    }



?>
</table>
</body>
</html>