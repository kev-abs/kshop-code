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
      flex: 1; /* Hace que el contenido principal crezca y empuje el footer hacia abajo */
    }
  </style>
</head>
<body>

  <!-- ENCABEZADO -->
  <header class="bg-dark text-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <i class="bi bi-shop fs-3 text-warning me-2"></i>
        <span class="fs-4 fw-bold">K-SHOP</span>
      </div>
      <form class="d-none d-md-flex w-25" action="/buscar" method="GET">
        <input type="text" class="form-control form-control-sm" name="q" placeholder="Buscar...">
      </form>
      <ul class="nav">
        <li class="nav-item"><a href="../index.php" class="nav-link text-white">Inicio</a></li>
        <li class="nav-item"><a href="Productos.php" class="nav-link text-white">Productos</a></li>
        <li class="nav-item"><a href="servicios.php" class="nav-link text-white">Servicios</a></li>
        <li class="nav-item"><a href="contactos.php" class="nav-link text-white">Contacto</a></li>
      </ul>
    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="container py-5">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    <div class="card mb-4 shadow-sm">
      <div class="row g-0">
        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center">
          <img src="#" class="img-fluid" alt="Producto">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Producto genérico</h5>
            <p class="card-text text-danger fw-bold">0 COP <del class="text-muted">0 COP</del></p>
            <p class="card-text">Descripción del producto.</p>
            <p class="card-text"><small class="text-muted">Talla: #</small></p>

    <!-- Tarjeta de producto simulada -->
    <div class="d-flex justify-content-center">
      <div class="card mb-4" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../Imagenes/camiseta boxy.jpeg" class="img-fluid rounded-start" alt="Producto"
              style="background-color: #f0f0f0; height: 100%; width: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title fw-bold">0 COP</h5>
              <p class="card-text">Descripción</p>
              <p class="card-text"><small class="text-muted">Talla: #</small></p>
            </div>
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
