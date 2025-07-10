<?php
session_start();

// Verificar acceso
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "vendedor") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Simular datos del administrador (reemplazar con SELECT real de la base de datos si lo deseas)
$vendedor = [
    "nombre" => "Vendedor",
    "correo" => "Jose@kshop.com",
    "telefono" => "3100000000",
    "foto" => "../Imagenes/admin_profile.png"
];

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vendedor["nombre"] = $_POST["nombre"];
    $vendedor["correo"] = $_POST["correo"];
    $vendedor["telefono"] = $_POST["telefono"];

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        $nombreFoto = "admin_" . time() . "." . $extension;
        $destino = "../Imagenes/" . $nombreFoto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        $vendedor["foto"] = $destino;
    }

    // Aquí puedes guardar en base de datos si deseas
    header("Location: perfil_vendedor.php?actualizado=1");
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
<body>

<header class="bg-dark py-3 text-white">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="bi bi-pencil-square fs-4 text-warning me-2"></i>
      <h4 class="mb-0">Editar Perfil del Vendedor</h4>
    </div>
    <a href="perfil_vendedor.php" class="btn btn-outline-light">
      <i class="bi bi-arrow-left"></i> Volver al Perfil
    </a>
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
            <input type="text" name="nombre" id="nombre" class="form-control" required value="<?= $vendedor["nombre"] ?>">
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" required value="<?= $vendedor["correo"] ?>">
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required value="<?= $vendedor["telefono"] ?>">
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