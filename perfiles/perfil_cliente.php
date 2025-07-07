<?php
session_start();

// Evitar que el navegador guarde en caché esta página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Verificar si la sesión está activa y si el rol es "cliente"
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Datos de sesión simulados si no existen aún
$nombre = $_SESSION["nombre"] ?? "Nombre no disponible";
$correo = $_SESSION["correo"] ?? "Correo no disponible";
$telefono = $_SESSION["telefono"] ?? "No registrado";
$documento = $_SESSION["documento"] ?? "No registrado";
$fecha_registro = $_SESSION["fecha_registro"] ?? "Sin fecha";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Panel cliente</title>

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

      <!-- Volver al Panel -->
      <a href="../Paneles/panelcliente.php" class="nav-link text-dark fw-semibold">Volver</a>
      <!-- Pedidos -->
      <a href="pedidos.php" class="nav-link text-dark fw-semibold">Mis pedidos</a>
      <!--Lista de deseos-->
      <a href="lista_deseos.php" class="nav-link text-dark fw-semibold">Lista de deseos</a>
      <!--Carrito-->
      <a href="../Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>
      <!-- CERRAR SESIÓN-->
      <a href="../php/cerrarsesion.php" class="nav-link">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- Contenido -->
<div class="container mt-5">
  <h2 class="mb-4 text-center">👤 Mi Perfil</h2>

  <div class="card shadow">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-6">
          <strong>Nombre:</strong>
          <p><?= htmlspecialchars($nombre) ?></p>
        </div>
        <div class="col-md-6">
          <strong>Correo:</strong>
          <p><?= htmlspecialchars($correo) ?></p>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <strong>Teléfono:</strong>
          <p><?= htmlspecialchars($telefono) ?></p>
        </div>
        <div class="col-md-6">
          <strong>Documento:</strong>
          <p><?= htmlspecialchars($documento) ?></p>
        </div>
      </div>

      <div class="mb-3">
        <strong>Fecha de registro:</strong>
        <p><?= htmlspecialchars($fecha_registro) ?></p>
      </div>

      <div class="text-end">
        <a href="./editar_perfil_cliente.php" class="btn btn-primary">Editar Perfil</a>
        <a href="../Paneles/panelcliente.php" class="btn btn-secondary">Volver</a>
      </div>
    </div>
  </div>
</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
