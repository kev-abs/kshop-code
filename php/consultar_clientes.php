<?php
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar Clientes - K-SHOP</title>
  <link rel="stylesheet" href="../Estilos/stilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">Clientes Registrados</h2>
  <a href="../Paneles/paneladmin.php" class="btn btn-secondary mb-3">← Volver al Panel</a>

  <?php
  $sql = "SELECT * FROM Cliente ORDER BY Fecha_Registro DESC";
  $resultado = $conexion->query($sql);

  if ($resultado->num_rows > 0): ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Fecha de Registro</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $fila['ID_Cliente'] ?></td>
          <td><?= $fila['Nombre'] ?></td>
          <td><?= $fila['Correo'] ?></td>
          <td><?= $fila['Fecha_Registro'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No hay clientes registrados.</div>
  <?php endif; ?>
</div>
</body>
</html>
