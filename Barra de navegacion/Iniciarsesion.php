<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a href="../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="./Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <!-- CARRITO -->
      <a href="./carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>

      <!-- INICIAR SESIÓN -->
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<main class="flex-fill d-flex justify-content-center align-items-center" 
      style="background: linear-gradient(135deg, #f5f7fa, #c3cfe2);">

  <div class="card shadow-lg rounded-5 p-5" style="width: 100%; max-width: 420px;">
    <div class="card-body">

      <!-- Título -->
      <h2 class="card-title text-center mb-4 fw-bold text-dark">Iniciar Sesión</h2>

      <!-- Formulario -->
      <form action="../php/login.php" method="POST" class="d-flex flex-column gap-3">

        <!-- Email -->
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
        </div>

        <!-- Contraseña -->
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="bi bi-lock-fill"></i></span>
          <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
        </div>

        <!-- Botón -->
        <button type="submit" class="btn btn-dark fw-bold mt-2 w-100">
          Ingresar
        </button>
      </form>

      <!-- Links -->
      <div class="text-center mt-4">
        <a href="./registro.php" class="link-dark d-block mb-1">¿No tienes cuenta? Regístrate</a>
        <a href="./restablecer_contraseña.php" class="link-dark d-block mb-1">Olvidé mi contraseña</a>
        <a href="../index.php" class="link-dark d-block mt-2">← Volver al inicio</a>
      </div>

    </div>
  </div>
</main>



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