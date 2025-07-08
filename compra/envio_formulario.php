<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envio_tipo'], $_POST['envio_valor']) && is_numeric($_POST['envio_valor'])) {
        $_SESSION['envio_tipo'] = $_POST['envio_tipo'];
        $_SESSION['envio_valor'] = (int) $_POST['envio_valor'];
    }
}


// Recuperar el carrito
$carrito = $_SESSION['carrito'] ?? [];
$subtotal = 0;

foreach ($carrito as $producto) {
    $cantidad = $producto['cantidad'] ?? 1;
    $subtotal += $producto['precio'] * $cantidad;
}

// Recuperar costo de envío
$envio = $_SESSION['envio_valor'] ?? 0;
$total = $subtotal + $envio;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Envío a Domicilio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html,
    body {
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

    .logo-img {
      height: 40px;
      margin-right: 10px;
    }

    .resumen-fijo img {
      width: 100px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <header class="bg-white sticky-top py-3 border-bottom shadow-sm">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
        <a href="../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
      </div>
      <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
        <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
      </form>
      <nav class="d-flex align-items-center gap-3">
        <a href="../Barra de navegacion/Productos.php" class="nav-link text-dark">Productos</a>
        <a href="../Barra de navegacion/servicios.php" class="nav-link text-dark">Servicios</a>
        <a href="../Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
          <i class="bi bi-cart-fill"></i>
        </a>
        <a href="./Barra de navegacion/Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
          <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
        </a>
      </nav>
    </div>
  </header>

  <main class="container my-5">
    <div class="row">
      <!-- Formulario de envío -->
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
          <!-- Datos personales -->
          <h5 class="mt-4">Datos Personales</h5>
          <div class="row g-3">
            <div class="col-md-6"><label>Nombre</label><input type="text" class="form-control" required></div>
            <div class="col-md-6"><label>Apellidos</label><input type="text" class="form-control" required></div>
            <div class="col-md-6"><label>E-mail</label><input type="email" class="form-control" required></div>
            <div class="col-md-6"><label>Teléfono</label><input type="tel" class="form-control" required></div>
            <div class="col-md-6">
              <label>Tipo de documento</label>
              <select class="form-select" required>
                <option value="CC">Cédula</option>
                <option value="TI">Tarjeta de Identidad</option>
              </select>
            </div>
            <div class="col-md-6"><label>Número de documento</label><input type="text" class="form-control" required>
            </div>
          </div>

          <!-- Dirección -->
          <h5 class="mt-5">Dirección de envío</h5>
          <div class="row g-3">
            <div class="col-12"><input type="text" class="form-control" placeholder="Calle y número" required></div>
            <div class="col-12"><input type="text" class="form-control" placeholder="Escalera, piso... (Opcional)">
            </div>
            <div class="col-md-6"><input type="text" class="form-control" placeholder="Código postal" required></div>
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
              </select>
            </div>
          </div>

          <!-- Botón continuar -->
          <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="metodo de envio.php" class="btn btn-link">&lt; Volver</a>
            <button type="submit" class="btn btn-dark btn-lg w-50">CONTINUAR</button>
          </div>
        </form>
      </div>

      <!-- Resumen de compra -->
      <div class="col-md-4">
  <div class="resumen-fijo">
    <h5 class="fw-bold mb-4">
      Resumen de la compra (<?= count($carrito) ?>)
    </h5>

    <?php if (!empty($carrito)): ?>
      <?php foreach ($carrito as $producto): ?>
        <?php
          $cantidad = $producto['cantidad'] ?? 1;
          $subtotal_producto = $producto['precio'] * $cantidad;
        ?>
        <div class="d-flex align-items-center mb-3">
          <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Producto" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
          <div>
            <p class="mb-0 fw-bold">
              $<?= number_format($producto['precio'], 0, ',', '.') ?> x <?= $cantidad ?>
            </p>
            <p class="mb-1 small"><?= htmlspecialchars($producto['descripcion'] ?? 'Producto sin descripción') ?></p>
            <p class="small text-muted mb-0">
              Talla: <?= $producto['talla'] ?? 'Única' ?><br>
              Subtotal: $<?= number_format($subtotal_producto, 0, ',', '.') ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-warning">Tu carrito está vacío.</div>
    <?php endif; ?>

    <hr>
    <div class="d-flex justify-content-between">
      <span>Subtotal</span>
      <span>$<?= number_format($subtotal, 0, ',', '.') ?></span>
    </div>
    <div class="d-flex justify-content-between">
      <span>Envío</span>
      <span>$<?= number_format($envio, 0, ',', '.') ?></span>
    </div>
    <div class="d-flex justify-content-between fw-bold mt-2">
      <span>Total</span>
      <span>$<?= number_format($total, 0, ',', '.') ?></span>
    </div>
  </div>
</div>

    </div>
  </main>

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