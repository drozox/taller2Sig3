<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Comprobar si se recibió la variable "dataS"
if (isset($_POST["dataS"])) {
    // Obtener el valor de "dataS"
    $cadena = $_POST["dataS"];

    // Imprimir el valor recibido para verificar y como está bien enviado desde el script no necesito cambiarlo.
    echo 'cadena'.$cadena;



    // Construir la consulta SQL para insertar la línea en la tabla polilineas
    $sql = "INSERT INTO rutas (nombre, geom) VALUES ('ruta1', ST_GeomFromGeoJSON('$cadena'))";

    // Ejecutar la consulta SQL
    $query = pg_query($conexion, $sql);
    
    if ($query) {
        echo "Datos insertados correctamente en la base de datos.";
    } else {
        echo "Error al insertar datos en la base de datos.";
    }
} else {
    echo "Error: no se recibió 'dataS'";
}
?>
