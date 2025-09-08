<?php
session_start();
include '../conexion/conexion.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];

// Obtener la imagen binaria desde la base de datos
$stmt = $conexion->prepare("SELECT Imagen FROM producto WHERE ID_Producto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($imagenBinaria);
$stmt->fetch();
$stmt->close();

// Verificar si hay imagen
if ($imagenBinaria) {
    // Codificar la imagen en base64 para que se pueda mostrar
    $imagenBase64 = base64_encode($imagenBinaria);
} else {
    // Imagen por defecto (opcional)
    $imagenBase64 = '';
}

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si el producto ya está en el carrito, aumentar cantidad
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad']++;
} else {
    $_SESSION['carrito'][$id] = [
        'titulo' => $titulo,
        'precio' => $precio,
        'imagen' => $imagenBase64,
        'cantidad' => 1
    ];
}

// Redirigir al carrito
header("Location: carrito.php");
exit;
