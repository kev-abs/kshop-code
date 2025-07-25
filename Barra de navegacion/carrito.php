<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Carrito de compras</title>
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

    .logo-img {
      height: 40px;
      margin-right: 10px;
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

    .btn-outline-dark:hover {
      background-color: #0d6efd;
      color: white !important;
    }

    .btn-outline-dark.text-danger:hover {
      background-color: #dc3545;
      color: white !important;
    }
  </style>
</head>
<body>

  <!-- ENCABEZADO -->
  <header class="bg-white sticky-top py-3 border-bottom shadow-sm">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">

      <!-- LOGO -->
      <div class="d-flex align-items-center">
        <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
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
        <a href="./Barra de navegacion/contactos.php" class="nav-link text-dark">Contáctanos</a>

        <!-- CARRITO -->
        <a href="./Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
          <i class="bi bi-cart-fill"></i>
        </a>

        <!-- INICIAR SESIÓN -->
        <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
          <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
        </a>
      </nav>
    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="container py-5">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    <!-- Producto simulado -->
    <div class="card mb-4 shadow-sm">
      <div class="row g-0">
        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center">
          <img src="../Imagenes/camiseta boxy.jpeg" class="img-fluid" alt="Producto">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Producto genérico</h5>
            <p class="card-text text-danger fw-bold">0 COP <del class="text-muted">0 COP</del></p>
            <p class="card-text">Descripción del producto.</p>
            <p class="card-text"><small class="text-muted">Talla: #</small></p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-end">
      <p class="fs-5 fw-bold">Total: <span class="text-danger">0 COP</span></p>
      <div class="d-flex justify-content-end gap-2">
        <form action="../compra/metodo de envio.php" method="GET">
          <button type="submit" class="btn btn-success">Comprar</button>
        </form>
        <form action="#">
          <button type="submit" class="btn btn-outline-secondary">Vaciar Carrito</button>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-4">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>

  <script src="../Funciones/funciones.js" defer></script>
</body>
</html>
