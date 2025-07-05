<?php
include '../conexion/conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Cliente WHERE ID_Cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Editar Cliente</h2>
  <form action="./actualizar_clientes.php" method="POST">
    <input type="hidden" name="id" value="<?= $cliente['ID_Cliente'] ?>">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" value="<?= $cliente['Nombre'] ?>" required>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" class="form-control" name="correo" value="<?= $cliente['Correo'] ?>" required>
    </div>

    <div class="mb-3">
      <label for="estado" class="form-label">Estado:</label>
      <select class="form-select" name="estado" required>
        <option value="Activo" <?= $cliente['Estado'] === 'Activo' ? 'selected' : '' ?>>Activo</option>
        <option value="Inactivo" <?= $cliente['Estado'] === 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
        <option value="Suspendido" <?= $cliente['Estado'] === 'Suspendido' ? 'selected' : '' ?>>Suspendido</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="../Paneles/paneladmin.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
