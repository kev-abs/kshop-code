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
      background-color: #ffffff;
      color: #000;
    }
    .btn-white-hover-blue {
      background-color: #fff;
      color: #000;
      border: 1px solid #ced4da;
    }
    .btn-white-hover-blue:hover {
      background-color: #0d6efd;
      color: #fff;
    }
    .btn-white-hover-red:hover {
      background-color: #dc3545;
      color: #fff;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
    .card h5 {
      color: #0d6efd;
    }
    .card:hover {
      transform: scale(1.02);
      transition: transform 0.3s ease-in-out;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
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
      <a href="./Barra de navegacion/Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- CONTENIDO -->
<main class="container py-5 flex-grow-1">
  <h1 class="text-center mb-5 fw-bold">Nuestros Servicios Disponibles en Bogotá</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-truck"></i> Envíos Rápidos</h5>
        <p>Entregas el mismo día en Bogotá para pedidos hechos antes del mediodía. Seguimiento en tiempo real.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-person-lines-fill"></i> Asesoría Personalizada</h5>
        <p>Asesores especializados te ayudan por chat o llamada a elegir el mejor producto para tu necesidad.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-arrow-repeat"></i> Devoluciones Gratuitas</h5>
        <p>Recogemos devoluciones sin costo adicional desde tu domicilio. Aplica términos y condiciones.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-tools"></i> Soporte Técnico Local</h5>
        <p>Cobertura total en Bogotá para atención técnica presencial o virtual en productos con garantía.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-journal-code"></i> Capacitación Gratuita</h5>
        <p>Participa en nuestros talleres mensuales sobre moda, cuidado de ropa y tendencias en nuestra sede.</p>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 text-center p-3">
        <h5><i class="bi bi-calendar-check"></i> Programación de Pedidos</h5>
        <p>Organiza tus entregas a futuro eligiendo día y hora preferida en la semana desde tu perfil.</p>
      </div>
    </div>
  </div>

  <!-- CONTACTO RÁPIDO -->
  <section class="py-5 mt-5 border-top">
    <div class="container">
      <h3 class="fw-bold text-center mb-4">¿Tienes dudas? Contáctanos</h3>
      <form class="row g-3 justify-content-center" method="post" action="../php/enviar_contacto.php">
        <div class="col-md-4">
          <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
        </div>
        <div class="col-md-4">
          <input type="email" name="correo" class="form-control" placeholder="Tu correo electrónico" required>
        </div>
        <div class="col-8">
          <textarea name="mensaje" class="form-control" rows="4" placeholder="Escribe tu mensaje" required></textarea>
        </div>
        <div class="col-8 text-end">
          <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        </div>
      </form>
    </div>
  </section>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 pb-3 mt-auto">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-4">
        <h5>Sobre K-Shop</h5>
        <p>Tu tienda online de confianza con los mejores productos, precios justos y atención personalizada.</p>
      </div>
      <div class="col-md-4">
        <h5>Enlaces Útiles</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Preguntas Frecuentes</a></li>
          <li><a href="#" class="text-white">Términos y Condiciones</a></li>
          <li><a href="#" class="text-white">Política de Privacidad</a></li>
          <li><a href="#" class="text-white">Devoluciones</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contáctanos</h5>
        <p><i class="bi bi-envelope"></i> contacto@kshop.com</p>
        <p><i class="bi bi-telephone"></i> +57 300 123 4567</p>
        <p><i class="bi bi-geo-alt"></i> Bogotá, Colombia</p>
      </div>
    </div>
    <div class="text-center border-top pt-3">
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
