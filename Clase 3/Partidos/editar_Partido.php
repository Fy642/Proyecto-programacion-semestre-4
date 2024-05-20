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

    $id_editar = $_GET['id'];
    if ($id_editar){
        $SQL =  "select * FROM partidos WHERE id = ".$id_editar;

        $consulta = $conn->query($SQL);
        if(!$resultado = $consulta->fetch_object()){
            header('Location: partidos.php');
            die();    
        }
    }else{
        $id_editar=$_POST["id"];
        if(!$id_editar){
            header('Location: partidos.php');
            die();
        }
    }

    if (isset($_POST["id_local"]) && isset($_POST["id_visitante"]) && isset($_POST["goles_local"]) && isset($_POST["goles_visitante"]) && isset($_POST["penales"]) && isset($_POST["penales_local"]) && isset($_POST["penales_visitante"]) && isset($_POST["fecha"])){
        $SQL="UPDATE partidos SET id_local = '".$_POST["nombre"]."', pais='".$_POST['pais']."', liga='".$_POST['liga']."' WHERE id =".$_POST["id"];
        $SQL="UPDATE partidos SET id_local = '".$_POST["id_local"]."', id_visitante='".$_POST["id_visitante"]."', goles_local='".$_POST["goles_local"]."', goles_visitante='".$_POST["goles_visitante"]."', penales='".$_POST["penales"]."', penales_local='".$_POST["penales_local"]."', penales_visitante='".$_POST["penales_visitante"]."', fecha='".$_POST["fecha"]."' WHERE id =".$_POST["id"];

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
            <input type="number" name="id_local" id="id_local"  value="<?=$resultado->id_local ?>"><br><br>
            <label for="id_visitante">ID de equipo visitante: </label>
            <input type="number" name="id_visitante" id="id_visitante"  value="<?=$resultado->id_visitante ?>"><br><br>
            <label for="goles_local">Goles de equipo local: </label>
            <input type="number" name="goles_local" id="goles_local"  value="<?=$resultado->goles_local ?>"><br><br>
            <label for="goles_visitante">Goles de equipo visitante: </label>
            <input type="number" name="goles_visitante" id="goles_visitante"  value="<?=$resultado->goles_visiatante ?>"><br><br>
            <label for="penales">Hubo penales: </label>
            <input type="number" name="penales" id="penales" value="<?=$resultado->penales ?>"><br><br>
            <label for="penales_local">Penales de equipo local: </label>
            <input type="number" name="penales_local" id="penales_local"  value="<?=$resultado->penales_local ?>"><br><br>
            <label for="penales_visitante">Penales de equipo visitante: </label>
            <input type="number" name="penales_visitante" id="penales_visitante"  value="<?=$resultado->penales_visitante ?>"><br><br>
            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" id="fecha"  value="<?=$resultado->fecha ?>"><br><br>
            <input type="hidden" name="id" value="<?= $id_editar?>">
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>