<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Servicios</title>

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
    .card {
      height: 100%;
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
          <a href="./carrito.php" class="nav-link"><i class="bi bi-cart-fill text-warning"></i></a>
        </li>
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

<!-- SERVICIOS -->
<section class="py-5">
  <div class="container">
    <h1 class="text-center mb-5">Servicios disponibles en Bogotá</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Envíos Rápidos en Bogotá</h5>
            <p class="card-text">Realizamos entregas el mismo día dentro de Bogotá para pedidos hechos antes del mediodía.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Asesoría Personalizada</h5>
            <p class="card-text">Contamos con asesores disponibles en la ciudad para ayudarte a elegir el mejor producto.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Devoluciones Gratuitas</h5>
            <p class="card-text">Las devoluciones se recogen directamente en tu domicilio en Bogotá, sin costo adicional.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Soporte Técnico Local</h5>
            <p class="card-text">Servicio técnico con cobertura total en Bogotá, incluyendo visitas domiciliarias si es necesario.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Capacitación y Formación</h5>
            <p class="card-text">Ofrecemos talleres y capacitaciones gratuitas presenciales en nuestra sede de Bogotá sobre el uso de productos tecnológicos.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">Programación de Pedidos</h5>
            <p class="card-text">Puedes programar tus pedidos para fechas y horarios específicos dentro de la capital.</p>
          </div>
        </div>
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

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
