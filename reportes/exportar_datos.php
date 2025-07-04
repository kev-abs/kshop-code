<?php
//  Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<?php
// Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Exportar Datos - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <!-- Título principal -->
  <h2 class="text-center mb-4">📤 Exportar Datos</h2>

  <!-- Botones de exportación -->
  <div class="row justify-content-center mb-5">
    <div class="col-md-4 text-center">
      <a href="#" class="btn btn-outline-primary btn-lg w-100 mb-3">Exportar Ventas</a>
    </div>
    <div class="col-md-4 text-center">
      <a href="#" class="btn btn-outline-success btn-lg w-100 mb-3">Exportar Inventario</a>
    </div>
  </div>

  <!-- Botón de volver -->
  <div class="text-center">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>
</div>

</body>
</html>
