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
    if (isset($_POST["id_local"]) && isset($_POST["id_visitante"]) && isset($_POST["goles_local"]) && isset($_POST["goles_visitante"]) && isset($_POST["penales"]) && isset($_POST["penales_local"]) && isset($_POST["penales_visitante"]) && isset($_POST["fecha"])){
        $SQL = 'INSERT INTO partidos (id_local, id_visitante, goles_local, goles_visitante, penales, penales_local, penales_visitante, fecha, eliminado) VALUES ("'.$_POST["id_local"].'", "'.$_POST["id_visitante"].'", "'.$_POST["goles_local"].'", "'.$_POST["goles_visitante"].'", "'.$_POST["penales"].'", "'.$_POST["penales_local"].'", "'.$_POST["penales_visitante"].'", "'.$_POST["fecha"].'", 0)';
        if($conn->query($SQL) == FALSE){
            echo "Error";
        }else{
            header("Location: partidos.php");
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
            <label for="id_local">ID de equipo local: </label>
            <input type="number" name="id_local" id="id_local"><br><br>
            <label for="id_visitante">ID de equipo visitante: </label>
            <input type="number" name="id_visitante" id="id_visitante"><br><br>
            <label for="goles_local">Goles de equipo local: </label>
            <input type="number" name="goles_local" id="goles_local"><br><br>
            <label for="goles_visitante">Goles de equipo visitante: </label>
            <input type="number" name="goles_visitante" id="goles_visitante"><br><br>
            <label for="penales">Hubo penales: </label>
            <input type="number" name="penales" id="penales"><br><br>
            <label for="penales_local">Penales de equipo local: </label>
            <input type="number" name="penales_local" id="penales_local"><br><br>
            <label for="penales_visitante">Penales de equipo visitante: </label>
            <input type="number" name="penales_visitante" id="penales_visitante"><br><br>
            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" id="fecha"><br><br>
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>