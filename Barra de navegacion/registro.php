<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css">
</head>
<body>

  <!-- Registro de usuario -->
  <div class="login-container">
    <h2>Registro de Cliente</h2>

    <form action="../php/registro.php" method="POST">
      <input type="text" name="nombre" placeholder="Nombre completo" required />
      <input type="email" name="correo" placeholder="Correo electrónico" required />
      <input type="password" name="contrasena" placeholder="Contraseña" required />
      <button type="submit">Registrarse</button>
    </form>

    <div class="link" style="margin-top: 10px;">
      <a href="Iniciarsesion.php">¿Ya tienes cuenta? Inicia sesión</a>
    </div>

    <div class="link" style="margin-top: 10px;">
      <a href="../index.php">← Volver al inicio</a>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">Ayuda</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
