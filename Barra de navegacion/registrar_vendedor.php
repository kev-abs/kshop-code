<!-- registrar_vendedor.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vendedor - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2 class="mb-4">Registrar Nuevo Vendedor</h2>
  <form action="guardar_vendedor.php" method="POST">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" name="correo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="contrasena" class="form-label">Contraseña:</label>
      <input type="password" name="contrasena" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    <a href="paneladmin.php" class="btn btn-secondary">Cancelar</a>
  </form>
</body>
</html>
