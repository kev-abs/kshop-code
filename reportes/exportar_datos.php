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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-info text-white text-center p-3 mb-4">
             <h2 class="m-0">Exportar Datos</h2>
            </div>
        </div>
    </div>

  <!-- Botones de exportación -->
  <div class="row justify-content-center mb-4">
    <div class="col-md-4 d-grid mb-2">
      <a href="#" class="btn btn-dark btn-lg">Exportar Ventas</a>
    </div>
    <div class="col-md-4 d-grid mb-2">
      <a href="#" class="btn btn-dark btn-lg">Exportar Inventario</a>
    </div>
  </div>

  <!-- INICIO - Botón de volver -->
  <div class="text-center mt-5">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>

</div>

</body>
</html>
