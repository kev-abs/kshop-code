<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Contáctanos</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .header-custom {
      background-color: #000;
    }
    .header-custom .nav-link {
      color: #fff;
      transition: color 0.3s;
    }
    .header-custom .nav-link:hover {
      color: #ffc107;
    }
    .logo-text {
      font-weight: bold;
      font-size: 1.4rem;
    }
    textarea {
      resize: none;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="header-custom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    <div class="d-flex align-items-center">
      <i class="bi bi-shop me-2 fs-4 text-warning"></i>
      <span class="logo-text text-light">K-SHOP</span>
    </div>
    <form action="/buscar" method="GET" class="d-none d-md-flex w-25">
      <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar...">
    </form>
    <nav>
      <ul class="nav">
        <li class="nav-item"><a href="./carrito.php" class="nav-link"><i class="bi bi-cart-fill text-warning"></i></a></li>
        <li class="nav-item"><a href="../index.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="./Productos.php" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="./servicios.php" class="nav-link">Servicios</a></li>
        <li class="nav-item"><a href="./contactos.php" class="nav-link">Contáctanos</a></li>
        <li class="nav-item">
          <a href="./Iniciarsesion.php" class="nav-link text-warning">
            <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- FORMULARIO DE CONTACTO CENTRADO -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 bg-white p-4 shadow rounded">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <form>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre" required>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control" placeholder="Tu correo" required>
          </div>
          <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="6" class="form-control" placeholder="Escribe tu mensaje aquí..." required></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-warning text-dark fw-bold">Enviar mensaje</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

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

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
