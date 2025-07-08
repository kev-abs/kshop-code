<?php
session_start();
include '../conexion/conexion.php'; // Conexión a la base de datos

// Consulta productos desde la base de datos
$consulta = "SELECT ID_Producto, Nombre, Descripcion, Imagen, Precio FROM producto";
$resultado = $conexion->query($consulta);

// Convertimos resultados a un array
$productos = [];
while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>K-SHOP - Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .card:hover {
      transform: scale(1.02);
      transition: transform 0.3s ease-in-out;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .nav-link {
      color: #000000 !important;
      transition: 0.3s;
    }
    .nav-link:hover {
      background-color: #0d6efd;
      color: white !important;
      border-radius: 0.375rem;
    }
  </style>
</head>
<body>

<!-- HEADER -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="83" class="me-2">
      <a href="../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>
    <nav class="d-flex align-items-center gap-3">
      <a href="./Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <a href="./carrito.php" class="btn btn-outline-dark border-0"><i class="bi bi-cart-fill"></i></a>
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- MAIN -->
<main class="container py-5">
  <h1 class="text-center mb-5 fw-bold">Explora Nuestro Catálogo</h1>
  <div class="row g-4">
    <?php foreach ($productos as $index => $producto): ?>
      <?php $imagenURL = '/kshop-code/imagenes_productos/' . $producto['Imagen']; ?>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100">
<<<<<<< HEAD
          <?php $imagenURL = '../imagenes_productos/' . $producto['Imagen']; ?>
<img src="<?= $imagenURL ?>" class="card-img-top img-fluid" alt="<?= $producto['Nombre'] ?>">

=======
          <!-- Imagen del producto con ruta local -->
          <img src="../Imagenes/<?= rawurlencode($producto['Imagen']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($producto['Nombre']) ?>">
>>>>>>> a7a1c9c3c6086568356f0ec8909326a3058ab5ed
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $producto['Nombre'] ?></h5>
            <p class="card-text">$<?= number_format($producto['Precio'], 0, ',', '.') ?></p>
            <button class="btn btn-outline-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $index ?>">Ver más</button>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalProducto<?= $index ?>" tabindex="-1" aria-labelledby="modalProductoLabel<?= $index ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $producto['Nombre'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
<<<<<<< HEAD
              <img src="<?= $imagenURL ?>" class="img-fluid mb-3" alt="<?= $producto['Nombre'] ?>">

=======
              <!-- Imagen del producto en el modal con ruta local -->
              <img src="../Imagenes/<?= rawurlencode($producto['Imagen']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($producto['Nombre']) ?>">
>>>>>>> a7a1c9c3c6086568356f0ec8909326a3058ab5ed
              <p><strong>Descripción:</strong> <?= $producto['Descripcion'] ?></p>
              <p><strong>Precio:</strong> $<?= number_format($producto['Precio'], 0, ',', '.') ?></p>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary disabled">Detalles</a>
              <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="id" value="<?= $producto['ID_Producto'] ?>">
                <input type="hidden" name="titulo" value="<?= $producto['Nombre'] ?>">
                <input type="hidden" name="precio" value="<?= $producto['Precio'] ?>">
                <input type="hidden" name="imagen" value="../Imagenes/<?= $producto['Imagen'] ?>">
                <button type="submit" class="btn btn-success">Agregar al carrito</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-4">
        <h5>Sobre K-Shop</h5>
        <p>Tu tienda en línea de confianza para moda moderna, cómoda y accesible. Descubre tu estilo con nosotros.</p>
      </div>
      <div class="col-md-4">
        <h5>Atención al Cliente</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Preguntas frecuentes</a></li>
          <li><a href="#" class="text-white">Envíos y devoluciones</a></li>
          <li><a href="#" class="text-white">Soporte técnico</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contáctanos</h5>
        <p><i class="bi bi-envelope"></i> contacto@kshop.com</p>
        <p><i class="bi bi-telephone"></i> +57 300 123 4567</p>
        <p><i class="bi bi-geo-alt"></i> Medellín, Colombia</p>
      </div>
    </div>
    <div class="text-center border-top pt-3">
      <p class="mb-0">&copy; 2025 K-Shop. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
