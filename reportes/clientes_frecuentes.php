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
  <title>Clientes Frecuentes - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <!-- INICIO - Título -->
  <h2 class="text-center mb-4">👥 Clientes Frecuentes</h2>
  <!-- FIN -->

  <!-- INICIO - Tabla de clientes frecuentes -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>Nombre del Cliente</th>
          <th>Total de Compras</th>
          <th>Valor Total Comprado</th>
        </tr>
      </thead>
      <tbody>
        <!-- Aquí se insertarán los resultados cuando se conecte la lógica -->
        <tr>
          <td colspan="3">Datos en construcción...</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- FIN - Tabla -->

  <!-- INICIO - Botón volver -->
  <div class="text-center mt-4">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>
  <!-- FIN - Volver -->

</div>

</body>
</html>
