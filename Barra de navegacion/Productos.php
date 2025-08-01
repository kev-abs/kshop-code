<?php
$productos = [
  [
    "titulo" => "Camiseta manga corta dama",
    "descripcion" => "Fresca y cómoda para el día a día.",
    "imagen" => "../Imagenes/camiseta aqua manga corta mujer.avif",
    "pagina" => "producto1.php",
    "precio" => 39900
  ],
  [
    "titulo" => "Camiseta Boxy Ultra Aestetick",
    "descripcion" => "Un estilo único y moderno.",
    "imagen" => "../Imagenes/camiseta boxy.jpeg",
    "pagina" => "producto1.php",
    "precio" => 80000
  ],
  [
    "titulo" => "Pantalón cargo cannabis",
    "descripcion" => "Un pantalón con mucha personalidad y estilo.",
    "imagen" => "../Imagenes/pantalon cargo.jpeg",
    "pagina" => "producto1.php",
    "precio" => 100000
  ],
  [
    "titulo" => "Camiseta manga corta caballero",
    "descripcion" => "Ideal para climas cálidos y casuales.",
    "imagen" => "../Imagenes/camiseta negra manga corta hombre.jpg",
    "pagina" => "producto2.php",
    "precio" => 42900
  ],
  [
    "titulo" => "Buzo dama",
    "descripcion" => "Perfecto para el clima frío.",
    "imagen" => "../Imagenes/camiseta blanca manga larga mujer.jpg",
    "pagina" => "producto3.php",
    "precio" => 59900
  ],
  [
    "titulo" => "Buzo caballero",
    "descripcion" => "Diseño moderno y cálido.",
    "imagen" => "../Imagenes/camiseta negra manga larga hombre.webp",
    "pagina" => "producto4.php",
    "precio" => 62900
  ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>K-SHOP - Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      color: #000;
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
    .btn-outline-dark:hover {
      background-color: #0d6efd;
      color: white !important;
    }
    .btn-outline-dark.text-danger:hover {
      background-color: #dc3545;
      color: white !important;
    }
    .card:hover {
      transform: scale(1.02);
      transition: transform 0.3s ease-in-out;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

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
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>      <a href="./carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<main class="container py-5">
  <h1 class="text-center mb-5 fw-bold">Explora Nuestro Catálogo</h1>
  <div class="row g-4">
    <?php foreach ($productos as $index => $producto): ?>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100">
          <img src="<?= $producto['imagen'] ?>" class="card-img-top img-fluid" alt="<?= $producto['titulo'] ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $producto['titulo'] ?></h5>
            <p class="card-text">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
            <button class="btn btn-outline-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $index ?>">Ver más</button>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalProducto<?= $index ?>" tabindex="-1" aria-labelledby="modalProductoLabel<?= $index ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $producto['titulo'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <img src="<?= $producto['imagen'] ?>" class="img-fluid mb-3" alt="<?= $producto['titulo'] ?>">
              <p><strong>Descripción:</strong> <?= $producto['descripcion'] ?></p>
              <p><strong>Precio:</strong> $<?= number_format($producto['precio'], 0, ',', '.') ?></p>
            </div>
            <div class="modal-footer">
              <a href="<?= $producto['pagina'] ?>" class="btn btn-secondary">Detalles</a>
              <button class="btn btn-success"
                onclick='agregarAlCarrito({
                  id: <?= $index + 1 ?>,
                  nombre: <?= json_encode($producto["titulo"]) ?>,
                  descripcion: <?= json_encode($producto["descripcion"]) ?>,
                  precio: <?= $producto["precio"] ?>,
                  imagen: <?= json_encode($producto["imagen"]) ?>
                })'>Agregar al carrito</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

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
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>

