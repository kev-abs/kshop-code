<?php
session_start();

// Verificación de rol
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Datos simulados del administrador
$admin = [
  "nombre"   => "Administrador Principal",
  "correo"   => "admin@kshop.com",
  "usuario"  => "admin1",
  "telefono" => "3000000000",
  "fecha_ingreso" => "2024-01-10",
  "ultima_sesion" => date("d/m/Y H:i:s"),
  "foto"     => "../Imagenes/admin_profile.png" // Asegúrate que exista esta imagen
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perfil del Administrador - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      background-color: #f8f9fa;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    .main-content {
      flex: 1;
    }
    .profile-card {
      border-left: 5px solid #ffc107;
    }
    .profile-img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-dark py-3 text-white shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="bi bi-person-circle fs-3 text-warning me-2"></i>
      <h4 class="mb-0">Perfil del Administrador</h4>
    </div>
    <a href="../Paneles/paneladmin.php" class="btn btn-outline-light">
      <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
  </div>
</header>

<!-- CUERPO -->
<main class="main-content container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
      <div class="card profile-card shadow-sm p-4">
        <div class="text-center mb-4">
          <img src="../Imagenes/foto_perfil_admin.png" alt="Foto de perfil" class="profile-img">
          <h4 class="mt-3"><?= $admin["nombre"] ?></h4>
          <p class="text-muted">Administrador General</p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h6 class="text-dark">📋 Datos de la cuenta</h6>
            <ul class="list-group mb-3">
              <li class="list-group-item"><strong>Usuario:</strong> <?= $admin["usuario"] ?></li>
              <li class="list-group-item"><strong>Correo:</strong> <?= $admin["correo"] ?></li>
              <li class="list-group-item"><strong>Teléfono:</strong> <?= $admin["telefono"] ?></li>
              <li class="list-group-item"><strong>Fecha de ingreso:</strong> <?= $admin["fecha_ingreso"] ?></li>
              <li class="list-group-item"><strong>Último acceso:</strong> <?= $admin["ultima_sesion"] ?></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h6 class="text-dark">🛠️ Permisos del administrador</h6>
            <ul class="list-group mb-3">
              <li class="list-group-item"><i class="bi bi-person-fill-check text-success me-2"></i>Gestión de empleados</li>
              <li class="list-group-item"><i class="bi bi-box-seam text-success me-2"></i>Control de productos</li>
              <li class="list-group-item"><i class="bi bi-graph-up-arrow text-success me-2"></i>Estadísticas y reportes</li>
              <li class="list-group-item"><i class="bi bi-currency-dollar text-success me-2"></i>Gestión de ventas y cupones</li>
            </ul>
          </div>
        </div>
        <div class="text-end">
          <a href="./editar_perfil.php" class="btn btn-outline-primary">
            <i class="bi bi-pencil-fill me-1"></i> Editar Perfil
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
