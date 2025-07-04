<?php
include '../conexion/conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Empleado WHERE ID_Empleado = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$vendedor = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Vendedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Editar Estado del Vendedor</h2>
  <form action="actualizar_vendedor.php" method="POST">
    <input type="hidden" name="id" value="<?= $vendedor['ID_Empleado'] ?>">

    <div class="mb-3">
      <label class="form-label">Nombre:</label>
      <input type="text" class="form-control" value="<?= $vendedor['Nombre'] ?>" disabled>
    </div>

    <div class="mb-3">
      <label class="form-label">Correo:</label>
      <input type="email" class="form-control" value="<?= $vendedor['Correo'] ?>" disabled>
    </div>

    <div class="mb-3">
      <label class="form-label">Estado:</label>
      <select class="form-select" name="estado" required>
        <option value="Activo" <?= $vendedor['Estado'] === 'Activo' ? 'selected' : '' ?>>Activo</option>
        <option value="Inactivo" <?= $vendedor['Estado'] === 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
        <option value="Suspendido" <?= $vendedor['Estado'] === 'Suspendido' ? 'selected' : '' ?>>Suspendido</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="../Paneles/paneladmin.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
