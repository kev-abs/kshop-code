<?php
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
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
  <title>Panel del Cliente - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

  <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="buscar-formulario">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../index.html">Comprar productos</a></li>
        <li><a href="Productos.html">Ver carrito</a></li>
        <li><a href="servicios.html">Pagar</a></li>
        <li><a href="../index.PHP" class="logout bg-light" onclick="cerrarSesion()">Cerrar Sesion</a></li>
      </ul>
    </nav>
  </div>

  <!-- Panel del Cliente -->
  <div class="panelcliente">
    <h2>Bienvenido al Panel del Cliente</h2>
  </div>
  <script src="../Funciones/funciones.js" defer></script>
</body>
</html>
