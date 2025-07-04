<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restablecer Contraseña - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">🔐 Restablecer contraseña</h2>
  
  <form action="../php/enviar_codigo.php" method="POST" class="card p-4 shadow mx-auto" style="max-width: 500px;">
    <div class="mb-3">
      <label for="correo" class="form-label">Correo electrónico:</label>
      <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Enviar código de verificación</button>
    <div class="text-center mt-3">
      <a href="Iniciarsesion.php" class="btn btn-link">← Volver al inicio de sesión</a>
    </div>
  </form>
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
