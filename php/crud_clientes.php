<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes - K-SHOP Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4 text-center">Gestión de Clientes - K-SHOP</h2>
  <div class="mb-3 text-end">
    <a href="crear_cliente.php" class="btn btn-success">+ Registrar Nuevo Cliente</a>
  </div>

  <?php
  include '../conexion/conexion.php';
  $sql = "SELECT * FROM Cliente";
  $resultado = $conexion->query($sql);

  if ($resultado->num_rows > 0): ?>
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Fecha de Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?php echo $fila['ID_Cliente']; ?></td>
          <td><?php echo $fila['Nombre']; ?></td>
          <td><?php echo $fila['Correo']; ?></td>
          <td><?php echo $fila['Fecha_Registro']; ?></td>
          <td>
            <a href="editar_cliente.php?id=<?php echo $fila['ID_Cliente']; ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="eliminar_cliente.php?id=<?php echo $fila['ID_Cliente']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-info">No hay clientes registrados.</div>
  <?php endif; ?>
</div>
</body>
</html>
