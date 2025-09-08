<?php
session_start();

// Bloqueo para evitar volver con "atrás"
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Validación de sesión
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Panel Admin</title>

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
    .nav-link.text-warning:hover {
      background-color: #dc3545;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
    .carousel img {
      object-fit: cover;
      height: 500px;
      filter: brightness(85%);
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">

      <!-- CERRAR SESIÓN-->
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
      <li><h6 class="dropdown-header">Perfil</h6></li>
      <li><a class="dropdown-item" href="../perfiles/perfil_admin.php">Perfil de Administrador</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><h6 class="dropdown-header">Gestión General</h6></li>
      <li><a class="dropdown-item" href="../Barra de navegacion/registrar_vendedor.php">Registrar Vendedor</a></li>
      <li><a class="dropdown-item" href="../php/consultar_vendedores.php">Consultar Vendedores</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../php/consultar_clientes.php">Consultar Clientes</a></li>
      <li><a class="dropdown-item" href="../php/listar_clientes.php">Agregar Cliente</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../Barra de navegacion/Admin_productos.php">Consultar Productos</a></li>
      <li><a class="dropdown-item" href="../Barra de navegacion/Admin_productos.php#formulario">Agregar Producto</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../Inventario/consultar_inventario.php">Consultar Inventario</a></li>
      <li><a class="dropdown-item" href="../Inventario/actualizar_inventario.php">Actualizar Inventario</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Consultar Ventas</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../reportes/estadisticas_ventas.php">Estadísticas de Ventas</a></li>
      <li><a class="dropdown-item" href="../reportes/exportar_datos.php">Exportar Datos</a></li>
      <li><a class="dropdown-item" href="../reportes/productos_mas_vendidos.php">Productos Más Vendidos</a></li>
      <li><a class="dropdown-item" href="../reportes/clientes_frecuentes.php">Clientes Frecuentes</a></li>
      <li><a class="dropdown-item" href="../reportes/bajo_inventario.php">Bajo Inventario</a></li>
      <li><a class="dropdown-item" href="../reportes/efectividad_cupones.php">Uso de Cupones</a></li>
    </ul>
  </div>
</div>

<!-- INFORMACIÓN DEL PANEL -->
<main class="container my-5">
  <div class="row justify-content-center text-center">
    <div class="col-lg-10">
      <h2 class="mb-4">Bienvenido al Panel de Administración de K-SHOP</h2>
      <p class="lead text-muted">
        Este panel está diseñado para brindarte control total sobre la tienda. Desde la gestión de usuarios hasta el análisis detallado de ventas,
        aquí encontrarás todas las herramientas necesarias para que K-SHOP funcione de forma óptima y profesional.
      </p>
      <hr class="my-4" />

      <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-people-fill me-2 text-warning"></i>Gestión de Empleados y Clientes</h5>
              <p class="card-text text-muted">Registra, consulta y controla la actividad de los usuarios y trabajadores de la tienda.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-box-seam me-2 text-warning"></i>Gestión de Productos e Inventario</h5>
              <p class="card-text text-muted">Administra tu catálogo de productos, mantén actualizado el inventario y garantiza la disponibilidad.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-graph-up-arrow me-2 text-warning"></i>Reportes y Estadísticas</h5>
              <p class="card-text text-muted">Accede a análisis detallados sobre ventas, productos más vendidos, clientes frecuentes y más.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body text-start">
              <h5 class="card-title text-dark"><i class="bi bi-currency-dollar me-2 text-warning"></i>Ventas y Promociones</h5>
              <p class="card-text text-muted">Consulta los movimientos de venta, controla los cupones y mejora la rentabilidad de la tienda.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="alert alert-light mt-5 border-start border-5 border-success shadow-sm">
        <h4 class="alert-heading">💡 ¡Tu rol importa!</h4>
        <p class="mb-0">Como administrador, eres el motor que impulsa el crecimiento de K-SHOP. Cada decisión cuenta. ¡Haz que cada clic construya una mejor tienda!</p>
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
