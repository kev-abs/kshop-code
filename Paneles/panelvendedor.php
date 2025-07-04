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
    <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="buscar-formulario">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../index.php">Comprar productos</a></li>
        <li><a href="Productos.php">Ver carrito</a></li>
        <li><a href="servicios.php">Pagar</a></li>
        <li><a href="../php/cerrarsesion.php" class="btn btn-outline-danger">Cerrar Sesión</a></li>
      </ul>
    </nav>
  </div>

    <!-- Buscador -->
    <form action="/buscar" method="GET">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>

    <!-- Navegación -->
    <nav class="navbar">
      <ul>
        <li><a href="../php">Cerrar sesión</a></li>
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
  <a href="../php/cerrarsesion.php" class="btn btn-danger">
  <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
</a>
  <footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">Ayuda</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
