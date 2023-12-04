<?php
include("php_scripts/conexion.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="CraftingGamerTom">

    <title>aplicando php</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.js"></script>

    <script src="script.js" defer></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- JQuery library -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #fafafa;
        }
    </style>
</head>

<body>

    <div class="container-fluid text-center">
        <div class="row align-items-start">

            <div class="col d-flex justify-content-center align-items-center ">
                <h1>Equipamientos de Cali</h1>
            </div>
        </div>
    </div>



    <main>

        <div class="offcanvas offcanvas-start w-50 p-3" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Opciones generales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div style="margin-top:20px;">
                    <h1>Información de Hurtos</h1>
                    <table class="table table-striped table-bordered" id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Barrio</th>

                                <th scope="col">Borrar</th>
                                <th scope="col">Acercar</th>


                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            $sql = "SELECT gid,barrio,ST_X(geom) as lng, ST_Y(geom) as lat from hurtos";
                            $result = pg_query($conexion, $sql);
                            
                            if (!$result) {
                                echo "Error al obtener los puntos.";
                                exit;
                            }

                            while ($row = pg_fetch_assoc($result)) {
                                $id = $row['gid'];
                                $nombre = $row['barrio'];
                                
                                $lat = $row['lat'];
                                $lng = $row['lng'];
                                
                                echo "<tr>";
                                echo "<th contenteditable='true'> $id </th>";

                                echo "<td contenteditable='true'>  $nombre </td>";
                                
                                echo "<td><button id='eliminar' class='botones2' type='button' onclick='{del( $id )}'><i class='fas fa-trash'></i></button></td>";
                                
                                echo "<td><button class='botones2' type='button' onclick='{zoomToLocation( $lat, $lng )}'><i class='bi bi-search'></i></button></td>" ;    
                                    
                                    
                                echo "</tr>";
                            
                            }
                            ?>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

        <div class="map-container">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Opciones
            </button>
            <div id="map"></div>

        </div>









</body>

</html>