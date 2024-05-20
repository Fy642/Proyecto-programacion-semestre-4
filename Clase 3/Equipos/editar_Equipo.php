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
        $SQL =  "select * FROM equipos WHERE id = ".$id_editar;

        $consulta = $conn->query($SQL);
        if(!$resultado = $consulta->fetch_object()){
            header('Location: equipos.php');
            die();    
        }
    }else{
        $id_editar=$_POST["id"];
        if(!$id_editar){
            header('Location: equipos.php');
            die();
        }
    }

    if(isset($_POST['nombre']) && isset($_POST['pais']) && isset($_POST['liga'])){
        $SQL="UPDATE equipos SET nombre = '".$_POST["nombre"]."', pais='".$_POST['pais']."', liga='".$_POST['liga']."' WHERE id =".$_POST["id"];

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
            <input type="text" id="nombre" name="nombre" value="<?=$resultado->nombre ?>"><br><br>
            <label for="pais">Pais: </label>
            <input type="text" id="pais" name="pais" value="<?=$resultado->pais ?>"><br><br>
            <label for="liga">Liga: </label>
            <input type="text" id="liga" name="liga" value="<?=$resultado->liga ?>"><br><br>
            <input type="hidden" name="id" value="<?= $id_editar?>">
            <button type="submit">Guardar</button>
        </form>
    </body>
</html>