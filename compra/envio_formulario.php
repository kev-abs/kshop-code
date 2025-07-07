<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Envío a Domicilio</title>
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
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a href="../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
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

  <!-- Cuerpo principal -->
  <main class="container my-5">
    <div class="row">
      <!-- Columna izquierda: formulario de datos -->
      <div class="col-md-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Método de envío</li>
            <li class="breadcrumb-item">Método de pago</li>
            <li class="breadcrumb-item">Resumen</li>
          </ol>
        </nav>

        <h2 class="fw-bold">Envío estándar a domicilio</h2>

        <form action="metodo_pago.php" method="POST">
          <h5 class="mt-4">Datos Personales</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Apellidos</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>E-mail</label>
              <input type="email" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Telefono</label>
              <input type="tel" name="telefono" placeholder="Teléfono" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Tipo de documento</label>
              <select class="form-select" required>
                <option value="CC">Cédula</option>
                <option value="TI">Tarjeta de Identidad</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Número de documento</label>
              <input type="text" class="form-control" required>
            </div>
          </div>

          <h5 class="mt-5">Dirección de envío</h5>
          <div class="row g-3">
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Calle y número" required>
            </div>
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Escalera, piso... (Opcional)">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Código postal" required>
            </div>
            <div class="col-md-6">
              <select class="form-select" required>
                <option value="">Seleccione departamento</option>
                <option value="Bogotá D.C.">Bogotá D.C.</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Municipio</label>
              <select class="form-select" name="municipio" required>
                <option value="">Seleccione municipio</option>
                <option>Bogotá</option>
                </optgroup>
              </select>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="metodo de envio.php" class="btn btn-link">&lt; Volver a método de envío</a>
            <button type="submit" class="btn btn-dark btn-lg w-50">CONTINUAR</button>
          </div>
        </form>

      </div>

      <!-- Columna derecha: Resumen -->
      <div class="col-md-4">
        <div class="resumen-fijo">
          <h5 class="fw-bold">Resumen de la compra (0)</h5>
          <div class="d-flex mb-3">
            <img src="../Imagenes/camiseta boxy.jpeg" alt="Producto" class="img-thumbnail me-3" style="width: 100px;">
            <div>
              <p class="mb-0 fw-bold">0 COP</p>
              <p class="mb-1 small">Descripcion</p>
              <p class="small text-muted mb-0">Talla: M</p>
            </div>
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-bold">
            <span>Subtotal</span>
            <span>0 COP</span>
          </div>
          <div class="d-flex justify-content-between fw-bold">
            <span>Total <small>(IVA incluido)</small></span>
            <span>0 COP</span>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
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
</body>

</html>