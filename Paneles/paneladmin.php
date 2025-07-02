<?php
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel del Administrador - K-SHOP</title>
  <link rel="stylesheet" href="../Estilos/stilos.css" />
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
        <li><a href="../index.php">Cerrar sesión
      </ul>
    </nav>
  </div>
  <div class="admin-header">
    Panel del Administrador - K-SHOP
  </div>

  <div class="admin-container">

    <!-- Sección: Gestión de Clientes -->
    <div class="admin-section">
      <div class="section-header">Gestión de Clientes</div>
      <div class="section-content">
        <button>Consultar Clientes</button>
        <button>Actualizar Clientes</button>
        <button>Eliminar Clientes</button>
      </div>
    </div>

    <!-- Sección: Gestión de Productos -->
    <div class="admin-section">
      <div class="section-header">Gestión de Productos</div>
      <div class="section-content">
        <button>Consultar Productos</button>
        <button>Agregar Producto</button>
        <button>Actualizar Producto</button>
        <button>Eliminar Producto</button>
      </div>
    </div>

    <!-- Sección: Gestión de Inventario -->
    <div class="admin-section">
      <div class="section-header">Inventario</div>
      <div class="section-content">
        <button>Consultar Inventario</button>
        <button>Actualizar Existencias</button>
      </div>
    </div>

    <!-- Sección: Ventas -->
    <div class="admin-section">
      <div class="section-header">Ventas</div>
      <div class="section-content">
        <button>Consultar Ventas</button>
        <button>Generar Reportes</button>
      </div>
    </div>

    <!-- Botón Cerrar Sesión -->
    <button class="logout-btn">Cerrar Sesión</button>

  </div>
  <script src="../Funciones/funciones.js"></script><script src="../Funciones/funciones.js" defer></script></body>
</html>
