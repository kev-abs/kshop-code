<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Sistema de Gestión</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Tu hoja de estilos -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .header-custom {
      background-color: #000;
      color:#000;
    }
    .header-custom a.nav-link {
      color: #fff;
      transition: color 0.3s;
    }
    .header-custom a.nav-link:hover {
      color: #ffc107;
    }
    .logo-text {
      font-weight: bold;
      font-size: 1.4rem;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="header-custom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <i class="bi bi-shop me-2 fs-4 text-warning"></i>
      <span class="logo-text text-light">K-SHOP</span>
    </div>

    <!-- Buscador -->
    <form action="/buscar" method="GET" class="d-none d-md-flex w-25">
      <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar...">
    </form>

    <!-- Navegación -->
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a href="./Barra de navegacion/carrito.php" class="nav-link">
            <i class="bi bi-cart-fill text-warning"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="./Barra de navegacion/Productos.php" class="nav-link">Productos</a>
        </li>
        <li class="nav-item">
          <a href="./Barra de navegacion/servicios.php" class="nav-link">Servicios</a>
        </li>
        <li class="nav-item">
          <a href="./Barra de navegacion/contactos.php" class="nav-link">Contáctanos</a>
        </li>
        <li class="nav-item">
          <a href="./Barra de navegacion/Iniciarsesion.php" class="nav-link text-warning">
            <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- CARRUSEL -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner fst-italic">
    <div class="carousel-item active">
      <img src="./Imagenes/ropa caballero.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa dama.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa niño.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <div class="mb-3">
      <a href="#" class="text-white me-3">Términos y condiciones</a>
      <a href="#" class="text-white me-3">Política de privacidad</a>
      <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="./Funciones/funciones.js" defer></script>
</body>
</html>
