<?php
session_start();

// Evitar que el navegador guarde en caché esta página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Verificar si la sesión está activa y si el rol es "cliente"
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel del Cliente - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
  <script>
    // Evitar que el usuario vea la página anterior con el botón "Atrás"
    window.addEventListener('pageshow', function (event) {
      if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
        window.location.href = "../Barra de navegacion/Iniciarsesion.php";
      }
    });
  </script>
</head>
<body>

  <!-- Encabezado  -->
<div class="header d-flex justify-content-between align-items-center p-3" style="background-color: #198754 ; color: #000;">
  <div class="logo fw-bold fs-3">K-SHOP</div>

  <!-- Buscador -->
  <form action="/buscar" method="GET" class="d-flex" style="max-width: 300px;">
    <input type="text" name="q" placeholder="Buscar..." class="form-control me-2" />
  </form>

  <!-- Navegación -->
  <nav>
    <ul class="nav">
      <li class="nav-item">
        <a href="../index.php" class="nav-link text-dark fw-bold">Inicio</a>
      </li>
      <li class="nav-item">
        <a href="../Barra de navegacion/productos.php" class="nav-link text-dark fw-bold">Productos</a>
      </li>
      <li class="nav-item">
        <a href="../Barra de navegacion/carrito.php" class="nav-link text-dark fw-bold">Carrito</a>
      </li>
      <li class="nav-item">
        <a href="../php/cerrarsesion.php" class="btn btn-outline-dark fw-bold">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
</div>


  <!-- Panel del Cliente -->
  <div class="container mt-5">
    <h2 class="text-center mb-4">Bienvenido al Panel del Cliente</h2>

    <div class="row text-center">
      <div class="col-md-4 mb-3">
        <a href="../Barra de navegacion/productos.php" class="btn btn-primary w-100">Comprar Productos</a>
      </div>
      <div class="col-md-4 mb-3">
        <a href="../Barra de navegacion/carrito.php" class="btn btn-warning w-100">Ver Carrito</a>
      </div>
      <div class="col-md-4 mb-3">
        <a href="../Barra de navegacion/servicios.php" class="btn btn-success w-100">Pagar</a>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="../php/cerrarsesion.php" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </div>
  </div>

  <script src="../Funciones/funciones.js" defer></script>
</body>
</html>
