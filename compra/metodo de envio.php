<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Método de Envío</title>
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
    <!-- Columna izquierda: Método de envío -->
    <div class="col-md-8">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Método de envío</li>
          <li class="breadcrumb-item">Método de pago</li>
          <li class="breadcrumb-item">Resumen</li>
        </ol>
      </nav>

      <h2 class="fw-bold mb-4">Elige un método de envío</h2>

      <div class="list-group mb-4">
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input type="radio" name="envio" value="express" class="form-check-input me-2 envio-opcion" />
            <strong>Express</strong><br />
            <small class="text-muted">Llega en 1-2 días</small>
          </div>
          <span class="fw-bold">$22,000 COP</span>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input type="radio" name="envio" value="estandar" class="form-check-input me-2 envio-opcion" />
            <strong>Estándar</strong><br />
            <small class="text-muted">Llega en 3-5 días</small>
          </div>
          <span class="fw-bold">$10,000 COP</span>
        </label>
      </div>

      <a href="envio_formulario.php" id="continuarBtn" class="btn btn-dark btn-lg w-100 disabled" tabindex="-1" aria-disabled="true">CONTINUAR</a>
    </div>

    <!-- Columna derecha: Resumen de compra -->
<div class="col-md-4 resumen-fijo">
  <h5 class="fw-bold">Resumen de la compra (<?= count($carrito) ?>)</h5>

  <?php if (!empty($carrito)): ?>
    <?php foreach ($carrito as $producto): ?>
      <?php
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
      ?>
      <div class="d-flex mb-3">
        <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Producto" class="img-thumbnail me-3" style="width: 100px;" />
        <div>
          <p class="mb-0 fw-bold">
            $<?= number_format($producto['precio'], 0, ',', '.') ?> x <?= $producto['cantidad'] ?>
          </p>
          <p class="mb-1 small"><?= htmlspecialchars($producto['titulo']) ?></p>
          <p class="small text-muted mb-0">Subtotal: $<?= number_format($subtotal, 0, ',', '.') ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    <hr />
    <div class="d-flex justify-content-between fw-bold">
      <span>Subtotal</span>
      <span id="subtotal" data-subtotal="<?= $total ?>">$<?= number_format($total, 0, ',', '.') ?></span>
    </div>
    <div class="d-flex justify-content-between fw-bold mt-2" id="totalEnvioRow" style="display: none;">
      <span>Total con envío</span>
      <span id="totalConEnvio">$0</span>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">Tu carrito está vacío.</div>
  <?php endif; ?>
</div>

  </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
  <div class="container">
    <div class="mb-3">
      <a href="#" class="text-white me-3">Términos y condiciones</a>
      <a href="#" class="text-white me-3">Política de privacidad</a>
      <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
    </div>
    <p class="mb-0">
      &copy; 2025 Tienda K-Shop - Todos los derechos reservados
    </p>
  </div>
</footer>
<script>
  document.querySelectorAll(".envio-opcion").forEach((radio) => {
    radio.addEventListener("change", function () {
      const continuarBtn = document.getElementById("continuarBtn");
      continuarBtn.classList.remove("disabled");
      continuarBtn.removeAttribute("aria-disabled");
      continuarBtn.setAttribute("tabindex", "0");

      // Obtener el subtotal desde el atributo personalizado
      const subtotalElemento = document.getElementById("subtotal");
      const subtotal = parseInt(subtotalElemento.getAttribute("data-subtotal"));

      // Obtener valor del envío seleccionado
      const envioSeleccionado = parseInt(this.parentElement.nextElementSibling?.textContent.replace(/\D/g, '')) || 
                                 parseInt(this.closest("label").querySelector("span").textContent.replace(/\D/g, ''));

      // Calcular total con envío
      const totalConEnvio = subtotal + envioSeleccionado;

      // Mostrar el total con envío
      const totalEnvioRow = document.getElementById("totalEnvioRow");
      const totalConEnvioElemento = document.getElementById("totalConEnvio");
      totalEnvioRow.style.display = "flex";
      totalConEnvioElemento.textContent = `$${totalConEnvio.toLocaleString("es-CO")}`;
    });
  });
</script>


<script>
  document.querySelectorAll(".envio-opcion").forEach((radio) => {
    radio.addEventListener("change", function () {
      const continuarBtn = document.getElementById("continuarBtn");
      continuarBtn.classList.remove("disabled");
      continuarBtn.removeAttribute("aria-disabled");
      continuarBtn.setAttribute("tabindex", "0");
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
