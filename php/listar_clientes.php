<?php
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2 class="mb-4">Registrar Nuevo Cliente</h2>

  <form action="registrar_cliente.php" method="POST">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" required>
    </div>

    <div class="mb-3">
      <label for="apellido" class="form-label">Apellido:</label>
      <input type="text" class="form-control" name="apellido" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono:</label>
      <input type="text" class="form-control" name="telefono" required>
    </div>

    <div class="mb-3">
      <label for="documento" class="form-label">Documento de Identidad:</label>
      <input type="text" class="form-control" name="documento" required>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" class="form-control" name="correo" required>
    </div>

    <div class="mb-3">
      <label for="contrasena" class="form-label">Contraseña:</label>
      <input type="password" class="form-control" name="contrasena" required>
    </div>

    <button type="submit" class="btn btn-success">Registrar</button>
    <a href="../Paneles/paneladmin.php" class="btn btn-secondary">Volver</a>
  </form>
</body>
</html>
