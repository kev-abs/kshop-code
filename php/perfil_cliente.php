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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perfil del Cliente - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

<!-- Encabezado -->
<div class="header d-flex justify-content-between align-items-center p-3" style="background-color: #a8c0c1; color: white;">
  <div class="logo fw-bold fs-3">K-SHOP</div>

  <nav>
    <ul class="nav">
      <li class="nav-item">
        <a href="../Paneles/panelcliente.php" class="nav-link text-dark fw-semibold">Panel</a>
      </li>
      <li class="nav-item">
        <a href="pedidos.php" class="nav-link text-dark fw-semibold">Mis pedidos</a>
      </li>
      <li class="nav-item">
        <a href="lista_deseos.php" class="nav-link text-dark fw-semibold">Lista de deseos</a>
      </li>
      <li class="nav-item">
        <a href="../php/cerrarsesion.php" class="btn">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
</div>

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
        <a href="./editar_perfil.php" class="btn btn-primary">Editar Perfil</a>
        <a href="../Paneles/panelcliente.php" class="btn btn-secondary">Volver</a>
      </div>
    </div>
  </div>
</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
