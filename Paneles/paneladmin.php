<?php
session_start();

// Evitar que el navegador guarde en caché esta página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Verificar si la sesión está activa y si el rol es "administrador"
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel del Administrador - K-SHOP</title>
  <link rel="stylesheet" href="../Estilos/stilos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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

<!-- Encabezado -->
<div class="header">
  <div class="logo">K-SHOP</div>
  <form action="/buscar" method="GET">
    <input type="text" name="q" placeholder="Buscar..." />
  </form>
  <nav class="navbar">
    <ul>
      <li>
        <a href="../php/cerrarsesion.php" class="btn btn-outline-danger">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Panel del Administrador -->
<div class="admin-header text-center my-4">
  <h2>Panel del Administrador - K-SHOP</h2>
</div>

<div class="admin-container container">

  <!-- Gestión de Clientes -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Gestión de Clientes</div>
    <div class="section-content">
      <a href="../php/listar_clientes.php" class="btn btn-primary">Consultar Clientes</a>
      <a href="../php/crear_cliente.php" class="btn btn-success">Agregar Cliente</a>
    </div>
  </div>

  <!-- Gestión de Productos -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Gestión de Productos</div>
    <div class="section-content">
      <button class="btn btn-primary">Consultar Productos</button>
      <button class="btn btn-success">Agregar Producto</button>
    </div>
  </div>

  <!-- Gestión de Inventario -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Inventario</div>
    <div class="section-content">
      <button class="btn btn-info">Consultar Inventario</button>
      <button class="btn btn-warning">Actualizar Existencias</button>
    </div>
  </div>

  <!-- Ventas -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Ventas</div>
    <div class="section-content">
      <button class="btn btn-secondary">Consultar Ventas</button>
      <button class="btn btn-dark">Generar Reportes</button>
    </div>
  </div>

  <!-- Botón Cerrar Sesión -->
  <div class="text-center mt-4">
    <a href="../php/cerrarsesion.php" class="btn btn-danger">
      <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
    </a>
  </div>

</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
