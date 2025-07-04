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
    .card h5 {
      color: #ffc107;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- ENCABEZADO -->
<header class="header-custom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    <div class="d-flex align-items-center">
      <i class="bi bi-shop me-2 fs-4 text-warning"></i>
      <a href="../index.PHP" class="fs-4 fw-bold">K-SHOP</a>
    </div>

    <form action="/buscar" method="GET" class="d-none d-md-flex w-25">
      <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar...">
    </form>

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

<!-- CONTENIDO -->
<main class="container py-5 flex-grow-1">
  <h1 class="text-center mb-5">Servicios disponibles en Bogotá</h1>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Envíos Rápidos</h5>
        <p>Entregas el mismo día en Bogotá para pedidos hechos antes del mediodía.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Asesoría Personalizada</h5>
        <p>Asesores disponibles para ayudarte a elegir el mejor producto para ti.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Devoluciones Gratuitas</h5>
        <p>Recogemos devoluciones sin costo adicional en tu domicilio en Bogotá.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Soporte Técnico Local</h5>
        <p>Cobertura total en Bogotá, incluyendo visitas técnicas domiciliarias.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Capacitación</h5>
        <p>Talleres gratuitos presenciales en nuestra sede sobre tecnología.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5>Programación de Pedidos</h5>
        <p>Programa tus entregas para fechas y horarios específicos en Bogotá.</p>
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
      <a href="#" class="text-white me-3">Ayuda</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

