<?php
include '../conexion/conexion.php'; // Conexión a la base de datos

// Obtener el ID del producto
$id_producto = $_GET['id'];  // Asume que el ID del producto se pasa por GET

// Consulta la imagen y su tipo de la base de datos
$consulta = "SELECT Imagen, Tipo FROM producto WHERE ID_Producto = ?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("i", $id_producto);
$stmt->execute();
$stmt->bind_result($imagen, $tipo);
$stmt->fetch();
$stmt->close();

// Configura los encabezados para servir la imagen
header("Content-Type: " . $tipo);
echo $imagen; // Muestra la imagen como binario
?>
