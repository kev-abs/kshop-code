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
        <a href="../php/cerrarsesion.php" class="btn">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Panel del Administrador -->
<div class="admin-header text-center my-4">
  <h2>Panel del Administrador - K-SHOP</h2>
</div>

<div class="admin-container container">

<!-- Gestión de vendedores -->
 <div class="admin-section mb-4">
    <div class="section-header h4">Gestión de Empleados</div>
    <div class="section-content">
      <a href="../Barra de navegacion/registrar_vendedor.php" class="btn btn-secondary">Registrar Vendedor</a>
      <a href="../php/consultar_vendedores.php" class="btn btn-secondary">Consultar Vendedores</a>
    </div>
  </div>


  <!-- Gestión de Clientes -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Gestión de Clientes</div>
    <div class="section-content">
      <a href="../php/consultar_clientes.php" class="btn btn-info">Consultar Clientes</a>
      <a href="../php/listar_clientes.php" class="btn btn-info">Agregar Cliente</a>
    </div>
  </div>

 <!-- Gestión de Productos -->
<div class="admin-section mb-4">
  <div class="section-header h4">Gestión de Productos</div>
  <div class="section-content">
    <a href="../Barra de navegacion/Admin_productos.php" class="btn btn-secondary">Consultar Productos</a>
    <a href="../Barra de navegacion/Admin_productos.php#formulario" class="btn btn-secondary">Agregar Producto</a>
  </div>
</div>


  <!-- Gestión de Inventario -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Inventario</div>
    <div class="section-content">
      <button class="btn btn-info">Consultar Inventario</button>
      <button class="btn btn-info">Actualizar Existencias</button>
    </div>
  </div>

  <!-- Ventas -->
  <div class="admin-section mb-4">
    <div class="section-header h4">Ventas</div>
    <div class="section-content">
      <button class="btn btn-secondary">Consultar Ventas</button>
    </div>
  </div>

  <!-- Módulo de Reportes y Estadísticas -->
    <div class="admin-section mb-4">
      <div class="section-header h4">Reportes y Estadísticas</div>
      <hr style="border: 1px solid gold;" />
    <div class="section-content d-grid gap-2 d-md-block text-center">

    <!-- Estadísticas de ventas -->
    <a href="../reportes/estadisticas_ventas.php" class="btn btn-info m-1">Estadísticas de Ventas</a>

    <!-- Exportación de datos -->
    <a href="../reportes/exportar_datos.php" class="btn btn-info m-1">Exportar Datos</a>

    <!-- Productos más vendidos -->
    <a href="../reportes/productos_mas_vendidos.php" class="btn btn-info m-1">Productos Más Vendidos</a>

    <!-- Clientes frecuentes -->
    <a href="../reportes/clientes_frecuentes.php" class="btn btn-info m-1">Clientes Frecuentes</a>

    <!-- Productos con bajo inventario -->
    <a href="../reportes/bajo_inventario.php" class="btn btn-info m-1">Bajo Inventario</a>

    <!-- Reporte de uso de cupones -->
    <a href="../reportes/efectividad_cupones.php" class="btn btn-info m-1">Uso de Cupones</a>

  </div>
</div>
</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
