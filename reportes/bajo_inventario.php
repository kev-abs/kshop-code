<?php
// Validar sesión como administrador
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
  <title>Productos con Bajo Inventario - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

   <!-- Título -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
        <h2 class="m-0">Productos con Bajo Inventario</h2>
      </div>
    </div>
  </div>

  <div class="container">
  <!--  Tabla -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>ID Producto</th>
          <th>Nombre</th>
          <th>Stock Actual</th>
        </tr>
      </thead>
    </table>

  <!-- Botón volver -->
  <div class="text-center mt-5 mb-3">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">&larr; Volver</a>
  </div>

</div>

</body>
</html>
