<?php
// INICIO - Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
// FIN - Validar sesión
?>

<?php
// INICIO - Conexión a la base de datos
include '../conexion/conexion.php';
// FIN - Conexión
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Efectividad de Cupones - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <!-- INICIO - Título -->
  <h2 class="text-center mb-4 text-info">🎟️ Efectividad de Cupones</h2>

  <!-- Tabla de cupones -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-info">
        <tr>
          <th>Código del Cupón</th>
          <th>Descuento (%)</th>
          <th>Total Usos</th>
        </tr>
      </thead>
      <tbody>

  <!-- Botón volver -->
  <div class="text-center mt-4">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>
</div>

</body>
</html>
