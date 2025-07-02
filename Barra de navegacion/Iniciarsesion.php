
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

  <div class="login-container">
    <h2>Iniciar Sesión</h2>

    <form action="../php/login.php" method="POST">
      <input type="email" name="correo" placeholder="Correo electrónico" required />
      <input type="password" name="contrasena" placeholder="Contraseña" required />
      <button type="submit">Ingresar</button>
    </form>

    <div class="link" style="margin-top: 10px;">
      <a href="./registro.php">¿No tienes cuenta? Regístrate</a>
    </div>
    <div class="link" style="margin-top: 10px;">
      <a href="./recuperarcontraseña.php">Olvidé mi contraseña</a>
    </div>
    <div class="link" style="margin-top: 15px;">
      <a href="../index.php">← Volver al inicio</a>
    </div>
  </div>

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
