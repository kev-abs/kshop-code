<?php
session_start();

// Obtener el carrito de la sesión
$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>K-SHOP - Carrito de Compras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .nav-link {
      color: #000 !important;
      transition: 0.3s;
    }
    .nav-link:hover {
      color: white !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
    }
    .btn-outline-dark:hover {
      background-color: #0d6efd;
      color: white !important;
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
      <a href="./Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <a href="./carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión</a>
    </nav>
  </div>
</header>

<!-- CONTENIDO -->
<main class="container py-5">
  <h2 class="text-center mb-4">Carrito de Compras</h2>

  <?php if (empty($carrito)): ?>
    <div class="alert alert-warning text-center">Tu carrito está vacío.</div>
  <?php else: ?>
    <?php foreach ($carrito as $id => $producto): 
      $subtotal = $producto['precio'] * $producto['cantidad'];
      $total += $subtotal;
    ?>
      <div class="card mb-4 shadow-sm">
        <div class="row g-0">
          <div class="col-md-4 bg-light d-flex align-items-center justify-content-center">
            <img src="data:image/jpeg;base64,<?= $producto['imagen'] ?>" class="img-fluid p-3" alt="Producto" width="200">

          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $producto['titulo'] ?></h5>
              <p class="card-text">Precio: <?= number_format($producto['precio'], 0) ?> COP</p>
              <p class="card-text">Cantidad: <?= $producto['cantidad'] ?></p>
              <p class="card-text fw-bold">Subtotal: <?= number_format($subtotal, 0) ?> COP</p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="text-end">
      <p class="fs-5 fw-bold">Total: <span class="text-danger"><?= number_format($total, 0) ?> COP</span></p>
      <div class="d-flex justify-content-end gap-2">
        <form action="../compra/metodo de envio.php" method="POST">
          <button type="submit" class="btn btn-success">Comprar</button>
        </form>
        <form action="vaciar_carrito.php" method="POST">
          <button type="submit" class="btn btn-outline-danger">Vaciar Carrito</button>
        </form>
      </div>
    </div>
  <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
