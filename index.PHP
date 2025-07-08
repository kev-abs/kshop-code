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
      background-color: #ffffff;
      color: #000000;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .nav-link {
      color: #000000 !important;
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-link:hover {
      color: #ffffff !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
    }
    .nav-link.text-warning:hover {
      background-color: #dc3545;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
    .carousel img {
      object-fit: cover;
      height: 500px;
      filter: brightness(85%);
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="./Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a href="./index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="./Barra de navegacion/Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./Barra de navegacion/servicios.php" class="nav-link text-dark">Servicios</a>
      <!-- CARRITO -->
      <a href="./Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>

      <!-- INICIAR SESIÓN -->
      <a href="./Barra de navegacion/Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- CARRUSEL -->
<div id="carouselKshop" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Imagenes/ropa caballero.jpeg" class="d-block w-100 object-fit-cover" alt="Caballeros" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Bienvenido a K-Shop</h2>
        <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa dama.jpg" class="d-block w-100 object-fit-cover" alt="Damas" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda femenina</h2>
        <p class="text-light">Tu estilo ideal está aquí</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa niño.jpg" class="d-block w-100 object-fit-cover" alt="Niños" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda infantil</h2>
        <p class="text-light">Para los más pequeños de casa</p>
      </div>
    </div>
  </div>
</div>

<style>
  .text-shadow {
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
  }
  .btn-outline-dark:hover {
    background-color: #0d6efd;
    color: white !important;
  }
  .btn-outline-dark.text-danger:hover {
    background-color: #dc3545;
    color: white !important;
  }
</style>

  <!-- INFORMACIÓN DESTACADA -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">¿Por qué elegirnos?</h2>
        <p class="text-muted">En K-Shop, tu satisfacción es nuestra prioridad</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <i class="bi bi-truck fs-1 text-warning"></i>
          <h5 class="mt-3">Envíos rápidos</h5>
          <p>Realizamos entregas el mismo día en zonas seleccionadas. Tu pedido llega cuando lo necesitas.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="bi bi-patch-check-fill fs-1 text-warning"></i>
          <h5 class="mt-3">Calidad garantizada</h5>
          <p>Productos seleccionados con altos estándares de calidad para que siempre luzcas increíble.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="bi bi-heart-fill fs-1 text-warning"></i>
          <h5 class="mt-3">Atención personalizada</h5>
          <p>Nuestro equipo está disponible para ayudarte a elegir lo mejor para ti o para regalar.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SOBRE NOSOTROS -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="./Imagenes/tienda_cajera.jpg" class="img-fluid rounded shadow" alt="Nuestro equipo">
        </div>
        <div class="col-md-6">
          <h3 class="fw-bold">Sobre K-Shop</h3>
          <p>Somos una tienda de moda colombiana comprometida con la diversidad y el estilo. En K-Shop creemos que vestirse bien es una forma de expresar quiénes somos. Nos dedicamos a ofrecer ropa de excelente calidad a precios accesibles para todas las edades.</p>
          <p>Con más de 10 años en el mercado, hemos aprendido a escuchar a nuestros clientes y evolucionar con sus necesidades.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FORMAS DE COMPRAR -->
  <section class="bg-warning text-dark py-5">
    <div class="container text-center">
      <h3 class="fw-bold">Formas de comprar en K-Shop</h3>
      <p class="mb-4">Queremos que tu experiencia sea fácil, cómoda y segura</p>
      <div class="row">
        <div class="col-md-4">
          <i class="bi bi-phone fs-1"></i>
          <h5>Desde tu celular</h5>
          <p>Explora nuestro catálogo y realiza tu pedido desde cualquier lugar.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-shop-window fs-1"></i>
          <h5>Recoge en tienda</h5>
          <p>Compra en línea y recoge en una de nuestras sedes aliadas.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-cash-coin fs-1"></i>
          <h5>Pagos seguros</h5>
          <p>Aceptamos diferentes métodos de pago para tu comodidad.</p>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center text-md-start py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <h5>K-SHOP</h5>
        <p>Tu tienda de moda en línea con lo mejor en estilo, comodidad y precio. ¡Gracias por elegirnos!</p>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Enlaces rápidos</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white">Inicio</a></li>
          <li><a href="./Barra de navegacion/productos.php" class="text-white">Productos</a></li>
          <li><a href="./Barra de navegacion/Productos.php" class="text-white">Servicios</a></li>
          <li><a href="./Barra de navegacion/Productos.php" class="text-white">Contáctanos</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Legal</h5>
        <ul class="list-unstyled">
          <li><a href="./legales/Terminos_de_uso.php" class="text-white">Términos y condiciones</a></li>
          <li><a href="./legales/politicas_de_privacidad.php" class="text-white">Política de privacidad</a></li>
          <li><a href="#" class="text-white">Cookies</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Contáctanos</h5>
        <p><i class="bi bi-envelope"></i> contacto@kshop.com</p>
        <p><i class="bi bi-telephone"></i> +57 301 000 0000</p>
        <p><i class="bi bi-geo-alt"></i> Bogotá, Colombia</p>
      </div>
    </div>
    <hr class="border-light">
    <p class="mb-0 text-center">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="./Funciones/funciones.js" defer></script>
</body>
</html>
