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
    if (isset($_POST["id_equipo"]) && isset($_POST["numero"]) && isset($_POST["nombre"])){
        $SQL = 'INSERT INTO jugadores (id_equipo, numero, nombre, eliminado) VALUES ("'.$_POST["id_equipo"].'", "'.$_POST["numero"].'", "'.$_POST["nombre"].'", 0)';
        if($conn->query($SQL) == FALSE){
            echo "Error";
        }else{
            header("Location: jugadores.php");
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
            <label for="id_equipo">ID del Equipo: </label>
            <input type="number" name="id_equipo" id="id_equipo"><br><br>
            <label for="numero">Numero: </label>
            <input type="number" name="numero" id="numero"><br><br>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"><br><br>
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>