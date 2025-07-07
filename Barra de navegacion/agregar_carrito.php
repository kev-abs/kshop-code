<?php
session_start();

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $imagen = $_POST['imagen'];

  if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad'] += 1;
  } else {
    $_SESSION['carrito'][$id] = [
      'titulo' => $titulo,
      'precio' => $precio,
      'imagen' => $imagen,
      'cantidad' => 1
    ];
  }
}

header('Location: Productos.php');
exit;
