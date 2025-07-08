<?php
session_start();

// Obtener productos del carrito
$carrito = $_SESSION['carrito'] ?? [];

// Calcular subtotal
$subtotal = 0;
foreach ($carrito as $producto) {
    $cantidad = $producto['cantidad'] ?? 1;
    $subtotal += $producto['precio'] * $cantidad;
}

// Obtener envío desde sesión
$envio = $_SESSION['envio_valor'] ?? 0;

// Calcular total
$total = $subtotal + $envio;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Método de Pago</title>
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
    .logo-img {
      height: 40px;
      margin-right: 10px;
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
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Método de envío</li>
          <li class="breadcrumb-item">Método de pago</li>
          <li class="breadcrumb-item">Resumen</li>
        </ol>
      </nav>

      <h2 class="fw-bold mb-4">Elige un método de pago</h2>

      <div class="list-group mb-4">
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input type="radio" name="metodo_pago" value="tarjeta" class="form-check-input me-2 envio-opcion" />
            <strong>Tarjeta</strong><br />
            <small class="text-muted">Crédito/Débito</small>
          </div>
        </label>
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input type="radio" name="metodo_pago" value="efectivo" class="form-check-input me-2 envio-opcion" />
            <strong>Efectivo</strong><br />
            <small class="text-muted">Contraentrega</small>
          </div>
        </label>
      </div>

      <div id="formularioTarjeta" class="mt-4 d-none">
        <h5 class="fw-bold">Datos de la tarjeta</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label for="nombreTarjeta">Nombre del titular</label>
            <input type="text" id="nombreTarjeta" class="form-control" placeholder="Como aparece en la tarjeta" />
          </div>
          <div class="col-md-6">
            <label for="numeroTarjeta">Número de tarjeta</label>
            <input type="text" id="numeroTarjeta" class="form-control" maxlength="16" placeholder="1234 5678 9012 3456" />
          </div>
          <div class="col-md-6">
            <label for="expiracionTarjeta">Fecha de expiración</label>
            <input type="month" id="expiracionTarjeta" class="form-control" />
          </div>
          <div class="col-md-6">
            <label for="cvvTarjeta">CVV</label>
            <input type="text" id="cvvTarjeta" class="form-control" maxlength="4" placeholder="123" />
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="envio_formulario.php" class="btn btn-link">&lt; Volver</a>
        <a href="compra_exitosa.php" id="continuarBtn" class="btn btn-dark btn-lg w-50 disabled" tabindex="-1" aria-disabled="true">CONTINUAR</a>
      </div>
    </div>

    <div class="col-md-4 resumen-fijo">
      <h5 class="fw-bold">Resumen de la compra (<?= count($carrito) ?>)</h5>
      <?php if (!empty($carrito)): ?>
        <?php foreach ($carrito as $producto): ?>
          <div class="d-flex mb-3">
            <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Producto" class="img-thumbnail me-3" style="width: 100px;" />
            <div>
              <p class="mb-0 fw-bold">$<?= number_format($producto['precio'], 0, ',', '.') ?> x <?= $producto['cantidad'] ?></p>
              <p class="mb-1 small"><?= htmlspecialchars($producto['titulo']) ?></p>
              <p class="small text-muted mb-0">Talla: <?= $producto['talla'] ?? 'Única' ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="alert alert-warning">Tu carrito está vacío.</div>
      <?php endif; ?>
      <hr />
      <div class="d-flex justify-content-between fw-bold">
        <span>Subtotal</span>
        <span>$<?= number_format($subtotal, 0, ',', '.') ?></span>
      </div>
      <div class="d-flex justify-content-between fw-bold">
        <span>Envío</span>
        <span>$<?= number_format($envio, 0, ',', '.') ?></span>
      </div>
      <div class="d-flex justify-content-between fw-bold mt-2">
        <span>Total</span>
        <span>$<?= number_format($total, 0, ',', '.') ?></span>
      </div>
    </div>
  </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
  <div class="container">
    <div class="mb-3">
      <a href="#" class="text-white me-3">Términos y condiciones</a>
      <a href="#" class="text-white me-3">Política de privacidad</a>
      <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script>
  document.querySelectorAll(".envio-opcion").forEach((radio) => {
    radio.addEventListener("change", function () {
      const continuarBtn = document.getElementById("continuarBtn");
      const formularioTarjeta = document.getElementById("formularioTarjeta");

      continuarBtn.classList.remove("disabled");
      continuarBtn.removeAttribute("aria-disabled");
      continuarBtn.setAttribute("tabindex", "0");

      if (this.value === "tarjeta") {
        formularioTarjeta.classList.remove("d-none");
      } else {
        formularioTarjeta.classList.add("d-none");
      }
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
