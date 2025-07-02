<?php
$host = "localhost";       // O IP del servidor, ej: 127.0.0.1
$usuario = "root";         // Usuario de MySQL
$contrasena = "";          // Contraseña del usuario
$base_datos = "Tiendakshop";  // Nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
