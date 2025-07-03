<?php
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "vendedor") {
    header("Location: ../Formularios/Iniciarsesion.php");
    exit();
}

// Evita que el navegador muestre contenido cacheado
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Vendedor - K-SHOP</title>
  <link rel="stylesheet" href="../Estilos/stilos.css">
</head>
<body>

  <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>

    <!-- Buscador -->
    <form action="/buscar" method="GET">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>

    <!-- Navegación -->
    <nav class="navbar">
      <ul>
        <li><a href="../index.html">Cerrar sesión</a></li>
      </ul>
    </nav>
  </div>

  <!-- Panel Vendedor -->
  <div class="panelvendedor">
  <h2>Panel del Vendedor</h2>

  <!-- Gestión de Productos -->
  <div class="seccion-vendedor">
    <h3>Gestión de Productos</h3>
    <button class="boton-vendedor">Ver mis Productos</button>
    <button class="boton-vendedor">Agregar Nuevo Producto</button>
    <button class="boton-vendedor">Editar Producto</button>
    <button class="boton-vendedor">Eliminar Producto</button>
  </div>

  <!-- Gestión de Ventas -->
  <div class="seccion-vendedor">
    <h3>Gestión de Ventas</h3>
    <button class="boton-vendedor">Consultar Ventas</button>
    <button class="boton-vendedor">Ver Comisiones</button>
    <button class="boton-vendedor">Descargar Reportes</button>
  </div>

  <!-- Cerrar sesión -->
  <button class="boton-vendedor logout" onclick="cerrarSesion()">Cerrar sesión</button>
</div>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
