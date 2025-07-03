<?php
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel del Administrador - K-SHOP</title>
  <link rel="stylesheet" href="../Estilos/stilos.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
  <div class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../php/cerrar_sesion.php" class="btn btn-outline-danger">Cerrar Sesión</a></li>
      </ul>
    </nav>
  </div>

  <div class="admin-header">Panel del Administrador - K-SHOP</div>

  <div class="admin-container">

    <div class="admin-section">
      <div class="section-header">Gestión de Clientes</div>
      <div class="section-content">
        <button>Consultar Clientes</button>
        <button>Actualizar Clientes</button>
        <button>Eliminar Clientes</button>
      </div>
    </div>

    <div class="admin-section">
      <div class="section-header">Gestión de Productos</div>
      <div class="section-content">
        <button>Consultar Productos</button>
        <button>Agregar Producto</button>
        <button>Actualizar Producto</button>
        <button>Eliminar Producto</button>
      </div>
    </div>

    <div class="admin-section">
      <div class="section-header">Inventario</div>
      <div class="section-content">
        <button>Consultar Inventario</button>
        <button>Actualizar Existencias</button>
      </div>
    </div>

    <div class="admin-section">
      <div class="section-header">Ventas</div>
      <div class="section-content">
        <button>Consultar Ventas</button>
        <button>Generar Reportes</button>
      </div>
    </div>

    <a href="../php/cerrar_sesion.php" class="btn btn-danger mt-4">
      <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
    </a>
  </div>

  <script src="../Funciones/funciones.js" defer></script>
</body>
</html>
