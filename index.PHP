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
    <div class="d-flex align-items-center">
      <i class="bi bi-shop fs-3 text-warning me-2"></i>
      <a href="./index.php" class="fs-4 fw-bold text-white text-decoration-none">K-SHOP</a>
    </div>
    <form class="d-none d-md-flex w-25" action="/buscar" method="GET">
      <input type="text" class="form-control form-control-sm" name="q" placeholder="Buscar...">
    </form>
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
          <p class="text-light">¡Tu estilo ideal está aquí!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./Imagenes/ropa niño.jpg" class="d-block w-100" alt="Niños">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-light">Bienvenido a K-Shop</h2>
          <p class="text-light">Moda para toda la familia</p>
        </div>
      </div>
    </div>
  </div>

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
          <img src="./Imagenes/equipo.jpg" class="img-fluid rounded shadow" alt="Nuestro equipo">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="./Funciones/funciones.js" defer></script>
</body>
</html>
