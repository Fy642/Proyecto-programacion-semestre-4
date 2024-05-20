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

    $consulta = $conn->query("SELECT * FROM `equipos` WHERE `eliminado` = 0 ORDER BY `id` ASC ");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            tbody, tr, td{
                border: solid;
                border-width:  1px 1px;
                padding: 3px;
            }
        </style>
    </head>
    <body>
        <table frame=void rules=rows>
            <thead>Jugadores</thead><br><br>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Pais</td>
                    <td>Liga</td>
                    <td>Borrar</td>
                    <td>Editar</td>
                </tr>
                <?php
                    while($resultado =$consulta->fetch_object()){
                        echo"<tr>
                                <td>".$resultado->id."</td>
                                <td>".$resultado->nombre."</td>
                                <td>".$resultado->pais."</td>
                                <td>".$resultado->liga."</td>
                                <td>
                                    <svg width='16' height='16' viewBox='0 0 64 64' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <a href='borrar_Equipo.php?id=".$resultado->id."'>
                                            <rect width='64' height='64' fill='white'/>
                                            <path d='M57 7L32 32L7 57' stroke='#FF0000' stroke-width='10' stroke-linecap='round'/>
                                            <path d='M7 7L32 32L57 57' stroke='#FF0000' stroke-width='10' stroke-linecap='round'/>
                                        </a>
                                    </svg>
                                </td>
                                <td>
                                    <svg width='16' height='16' viewBox='0 0 64 64' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <a href='editar_Equipo.php?id=".$resultado->id."'>
                                            <rect width='64' height='64' fill='#1E1E1E'/>
                                            <g clip-path='url(#clip0_0_1)'>
                                            <rect width='64' height='64' fill='white'/>
                                            <rect x='8' y='8' width='48' height='48' stroke='black' stroke-width='8' stroke-linejoin='round'/>
                                            <g style='mix-blend-mode:screen'>
                                            <rect x='39' y='12.7279' width='18' height='18' transform='rotate(-45 39 12.7279)' fill='white'/>
                                            </g>
                                            <path d='M58.8396 12.7477C60.9093 10.6779 60.9093 7.32211 58.8396 5.25233C56.7698 3.18256 53.414 3.18256 51.3442 5.25233L58.8396 12.7477ZM51.3442 5.25233L32.2523 24.3442L39.7477 31.8395L58.8396 12.7477L51.3442 5.25233Z' fill='black'/>
                                            <path d='M29.0559 35.0394L32.5295 25.1371L38.9582 31.5658L29.0559 35.0394Z' fill='black' stroke='black'/>
                                            </g>
                                            <defs>
                                            <clipPath id='clip0_0_1'>
                                            <rect width='64' height='64' fill='white'/>
                                            </clipPath>
                                            </defs>
                                        </a>
                                    </svg>
                                </td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table><br>
        
        <a href="agregar_Equipo.php">
            <button>Agregar Equipo</button>
        </a>
        <br>
        <a href="../index.php">
            <button>Regresar al inicio</button>
        </a>
    </body>
</html>