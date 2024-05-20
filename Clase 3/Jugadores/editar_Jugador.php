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
        $SQL =  "select * FROM jugadores WHERE id = ".$id_editar;

        $consulta = $conn->query($SQL);
        if(!$resultado = $consulta->fetch_object()){
            header('Location: jugadores.php');
            die();    
        }
    }else{
        $id_editar=$_POST["id"];
        if(!$id_editar){
            header('Location: jugadores.php');
            die();
        }
    }

    if(isset($_POST['id_equipo']) && isset($_POST['numero']) && isset($_POST['nombre'])){
        $SQL="UPDATE jugadores SET id_equipo = '".$_POST["id_equipo"]."', numero='".$_POST['numero']."', nombre='".$_POST['nombre']."' WHERE id =".$_POST["id"];

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
            <label for="id_equipo">ID del equipo: </label>
            <input type="number" id="id_equipo" name="id_equipo" value="<?=$resultado->id_equipo ?>"><br><br>
            <label for="numero">Numero: </label>
            <input type="number" id="numero" name="numero" value="<?=$resultado->numero ?>"><br><br>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" value="<?=$resultado->nombre ?>"><br><br>
            <input type="hidden" name="id" value="<?= $id_editar?>">
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>