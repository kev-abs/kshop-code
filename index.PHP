<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Sistema de Gestión</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .carousel-caption h2 {
      font-weight: bold;
      text-shadow: 1px 1px 5px black;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-dark text-white sticky-top py-3 shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">
    
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <i class="bi bi-shop fs-3 text-warning me-2"></i>
      <a href="./index.PHP" class="fs-4 fw-bold">K-SHOP</a>
    </div>

    <!-- Buscador -->
    <form class="d-none d-md-flex w-25" action="/buscar" method="GET">
      <input type="text" class="form-control form-control-sm" name="q" placeholder="Buscar...">
    </form>

    <!-- Navegación -->
    <ul class="nav">
      <li class="nav-item"><a href="./Barra de navegacion/carrito.php" class="nav-link text-white"><i class="bi bi-cart-fill text-warning"></i></a></li>
      <li class="nav-item"><a href="./Barra de navegacion/Productos.php" class="nav-link text-white">Productos</a></li>
      <li class="nav-item"><a href="./Barra de navegacion/servicios.php" class="nav-link text-white">Servicios</a></li>
      <li class="nav-item"><a href="./Barra de navegacion/contactos.php" class="nav-link text-white">Contáctanos</a></li>
      <li class="nav-item"><a href="./Barra de navegacion/Iniciarsesion.php" class="nav-link text-warning"><i class="bi bi-person-circle me-1"></i>Iniciar Sesión</a></li>
    </ul>
  </div>
</header>

<!-- CARRUSEL -->
<main>
  <div id="carouselKshop" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      
      <div class="carousel-item active">
        <img src="./Imagenes/ropa caballero.jpeg" class="d-block w-100" alt="Caballeros">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-light">Bienvenido a K-Shop</h2>
          <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="./Imagenes/ropa dama.jpg" class="d-block w-100" alt="Damas">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-light">Bienvenido a K-Shop</h2>
          <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="./Imagenes/ropa niño.jpg" class="d-block w-100" alt="Niños">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-light">Bienvenido a K-Shop</h2>
          <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
        </div>
      </div>

    </div>
  </div>
</main>

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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="./Funciones/funciones.js" defer></script>
</body>
</html>
