<?php
session_start();

// Validación de rol
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Evita caché en navegador
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="Cache-Control" content="no-store" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
</head>
<body>

<!-- Refuerzo con JavaScript por si el navegador cachea la página -->
<script>
  // Si no hay sesión activa (verificado desde PHP, pero por refuerzo en JS)
  <?php if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador"]): ?>
    alert("Sesión expirada. Redirigiendo...");
    window.location.href = "../Barra de navegacion/Iniciarsesion.php";
  <?php endif; ?>
</script>

<!-- Encabezado -->
<div class="header">
  <div class="logo">K-SHOP</div>
  <form action="/buscar" method="GET">
    <input type="text" name="q" placeholder="Buscar..." />
  </form>
  <nav class="navbar">
    <ul>
      <li><a href="../php/cerrarsesion.php" class="btn btn-outline-danger">Cerrar Sesión</a></li>
    </ul>
  </nav>
</div>

<div class="admin-header">Panel del Administrador - K-SHOP</div>

<div class="admin-container">

  <!-- Sección: Gestión de Clientes -->
  <div class="admin-section">
    <div class="section-header">Gestión de Clientes</div>
    <div class="section-content">
      <button onclick="location.href='../php/listar_clientes.php'">Consultar Clientes</button>
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
  <a href="../php/cerrarsesion.php" class="btn btn-danger mt-3">
    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
  </a>

</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
