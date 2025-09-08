<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $conexion->query("SELECT Imagen FROM producto WHERE ID_Producto = $id");

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        header("Content-type: image/jpeg");
        echo $row['Imagen'];
    } else {
        http_response_code(404);
        echo "Imagen no encontrada.";
    }
}
?>
