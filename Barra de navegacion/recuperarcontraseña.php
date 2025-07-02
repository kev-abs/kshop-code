<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/stilos.css">
</head>
<body>
  <!-- Recuperar contraseña -->
  <div class="login-container">
    <h2>Restablecer contraseña</h2>
    <input type="email" id="correoRecuperacion" placeholder="Correo electrónico" required />
    <input type="password" id="nuevaContrasenaRec" placeholder="Nueva contraseña" required />
    <input type="password" id="confirmarContrasenaRec" placeholder="Confirmar nueva contraseña" required />
    <button onclick="restablecerContrasena()">Restablecer contraseña</button>
    <div class="link">
      <a href="./Iniciarsesion.php" onclick="volverLogin()">Volver</a>
    </div>
  </div>
  <!--FOOTER-->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
