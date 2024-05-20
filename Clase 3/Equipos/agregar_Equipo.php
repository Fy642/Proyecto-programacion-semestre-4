<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_29_04_2024";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        die("fallo :".$conn->connect_error);
        exit();
    }
    if (isset($_POST["nombre"]) && isset($_POST["pais"]) && isset($_POST["liga"])){
        $SQL = 'INSERT INTO equipos (nombre, pais, liga, eliminado) VALUES ("'.$_POST["nombre"].'", "'.$_POST["pais"].'", "'.$_POST["liga"].'", 0)';
        if($conn->query($SQL) == FALSE){
            echo "Error";
        }else{
            header("Location: equipos.php");
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"><br><br>
            <label for="pais">Pais: </label>
            <input type="text" name="pais" id="pais"><br><br>
            <label for="liga">Liga: </label>
            <input type="text" name="liga" id="liga"><br><br>
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>