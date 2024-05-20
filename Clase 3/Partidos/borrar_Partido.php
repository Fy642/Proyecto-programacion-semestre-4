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

    $id_borrar = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : false);

    if (!$id_borrar) {
        header('Location: partidos.php');
        exit();
    }

    $SQL = "SELECT * FROM partidos WHERE id = " . $id_borrar;
    $consulta = $conn->query($SQL);
    if (!$resultado = $consulta->fetch_object()) {
        header('Location: partidos.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['confirmar']) && $_POST['confirmar'] == 'si') {
            $SQL = "UPDATE `partidos` SET `eliminado`= 1 WHERE `id` = $id_borrar";
            if ($conn->query($SQL) === FALSE) {
                echo "Error al eliminar el registro.";
            } else {
                header("Location: partidos.php");
                exit();
            }
        } else {
            header("Location: partidos.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            button{
                width: 65px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="">
            <p>Quieres borrar el partido con el id <?php echo $id_borrar ?>?</p>
            <a href="partidos.php">
                <button>No</button>
            </a>
            <button type="submit" name="confirmar" value="si">Si</button>
        </form>
    </body>
</html>