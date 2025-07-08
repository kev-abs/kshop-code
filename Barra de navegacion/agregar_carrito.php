<?php
session_start();

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

// Construir la ruta completa para mostrar correctamente la imagen
$ruta_imagen = '../imagenes_productos/' . $imagen;

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
        'imagen' => $ruta_imagen,
        'cantidad' => 1
    ];
}

// Redirigir al carrito
header("Location: carrito.php");
exit;
