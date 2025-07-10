<?php
session_start();

// Bloqueo para evitar volver con "atrás"
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Validación de sesión
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'vendedor') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Panel Vendedor</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      background-color: #ffffff;
      color: #000000;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .nav-link {
      color: #000000 !important;
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-link:hover {
      color: #ffffff !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>
    <nav class="d-flex align-items-center gap-3">
      <a href="../php/cerrarsesion.php" class="nav-link">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- Dropdown flotante -->
<div class="position-relative">
  <div class="dropdown position-absolute end-0 mt-3 me-4">
    <button class="btn btn-light dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-three-dots-vertical"></i>
    </button>
    <ul class="dropdown-menu">
      <li><h6 class="dropdown-header">Mi Perfil</h6></li>
      <li><a class="dropdown-item" href="../perfiles/perfil_vendedor.php">Ver Perfil</a></li>
      <li><a class="dropdown-item" href="../perfiles/editar_perfil_vendedor.php">Editar Perfil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><h6 class="dropdown-header">Gestión de Ventas</h6></li>
      <li><a class="dropdown-item" href="../ventas/consultar_ventas.php">Consultar Ventas</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><h6 class="dropdown-header">Clientes</h6></li>
      <li><a class="dropdown-item" href="../php/consultar_clientes.php">Consultar Clientes</a></li>
    </ul>
  </div>
</div>

<!-- INFORMACIÓN DEL PANEL -->
<main class="container my-5">
  <div class="row justify-content-center text-center">
    <div class="col-lg-10">
      <h2 class="mb-4">Bienvenido al Panel del Vendedor</h2>
      <p class="lead text-muted">
        Desde aquí puedes gestionar tus ventas, acceder al historial de clientes y mantener actualizada la información necesaria para optimizar tu labor comercial.
      </p>
      <hr class="my-4" />

      <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-cart-check-fill me-2 text-warning"></i>Gestión de Ventas</h5>
              <p class="card-text text-muted">Consulta el historial de ventas, registra nuevas operaciones y revisa detalles de pedidos realizados.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-person-lines-fill me-2 text-warning"></i>Clientes Frecuentes</h5>
              <p class="card-text text-muted">Consulta información de contacto y comportamiento de compra de tus clientes frecuentes.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-box-seam me-2 text-warning"></i>Disponibilidad de Productos</h5>
              <p class="card-text text-muted">Verifica qué productos están disponibles para ofrecer a tus clientes y realiza recomendaciones.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-bar-chart-line-fill me-2 text-warning"></i>Rendimiento de Ventas</h5>
              <p class="card-text text-muted">Consulta tus métricas de ventas y evalúa tu rendimiento mensual o semanal.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="alert alert-light mt-5 border-start border-5 border-success shadow-sm">
        <h4 class="alert-heading">📈 Tu gestión es clave</h4>
        <p class="mb-0">Cada venta cuenta. Aporta a la experiencia del cliente y al éxito de la tienda.</p>
      </div>
    </div>
  </div>
</main>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
