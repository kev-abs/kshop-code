<?php
session_start();

// Evitar acceso no autorizado
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
  "foto"     => "../Imagenes/admin_profile.png" // Asegúrate de tener esta imagen
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
    body {
      background-color: #f8f9fa;
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

<!-- PERFIL -->
<main class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card profile-card shadow-sm p-4">
        <div class="text-center mb-4">
          <img src="<?= $admin["foto"] ?>" alt="Foto de perfil" class="profile-img">
          <h5 class="mt-3 mb-0"><?= $admin["nombre"] ?></h5>
          <p class="text-muted">Administrador General</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <i class="bi bi-envelope-fill me-2 text-warning"></i><strong>Correo:</strong> <?= $admin["correo"] ?>
          </li>
          <li class="list-group-item">
            <i class="bi bi-person-badge-fill me-2 text-warning"></i><strong>Usuario:</strong> <?= $admin["usuario"] ?>
          </li>
          <li class="list-group-item">
            <i class="bi bi-telephone-fill me-2 text-warning"></i><strong>Teléfono:</strong> <?= $admin["telefono"] ?>
          </li>
        </ul>
        <div class="text-end mt-4">
          <a href="#" class="btn btn-outline-primary">
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
