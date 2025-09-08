<?php
session_start();

// Verificar acceso
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Simular datos del administrador (reemplazar con SELECT real de la base de datos si lo deseas)
$admin = [
    "nombre" => "Administrador Principal",
    "correo" => "admin@kshop.com",
    "telefono" => "3000000000",
    "foto" => "../Imagenes/admin_profile.png"
];

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admin["nombre"] = $_POST["nombre"];
    $admin["correo"] = $_POST["correo"];
    $admin["telefono"] = $_POST["telefono"];

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        $nombreFoto = "admin_" . time() . "." . $extension;
        $destino = "../Imagenes/" . $nombreFoto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        $admin["foto"] = $destino;
    }

    // Aquí puedes guardar en base de datos si deseas
    header("Location: perfil_admin.php?actualizado=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Editar Perfil - K-SHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
  </style>
</head>
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

<main class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm p-4">
        <div class="text-center mb-4">
          <img src="../Imagenes/foto_perfil_admin.png" class="profile-img" alt="Foto actual">
        </div>
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required value="<?= $admin["nombre"] ?>">
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" required value="<?= $admin["correo"] ?>">
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required value="<?= $admin["telefono"] ?>">
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Nueva foto de perfil</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small class="form-text text-muted">Si no seleccionas una nueva, se mantiene la actual.</small>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-circle me-1"></i> Guardar Cambios
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
