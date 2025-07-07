<?php
// Evitar que el navegador guarde en caché esta página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}


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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Panel cliente</title>

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
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">

      <!-- Perfil cliente -->
      <a href="../perfiles/perfil_cliente.php" class="nav-link text-dark fw-bold"> 
        <i class="bi bi-person-circle me-1"></i>Mi Perfil
      </a>
      <!-- Pedidos -->
       <a href="../php/pedidos.php" class="nav-link text-dark">Pedidos</a>
      <!--Lista de deseos-->
      <a href="../Barra de cliente/lista_de_deseos.php" class="nav-link text-dark">Lista de deseos</a>
      <!--Carrito-->
      <a href="../Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>
      <!-- CERRAR SESIÓN-->
      <a href="../php/cerrarsesion.php" class="nav-link">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- Panel del Cliente -->
<div class="container mt-5">
  <h2 class="text-center mb-4">Bienvenido a tu Panel de Cliente</h2>

  <!-- Productos recomendados -->
  <h4 class="text-center mt-5 mb-4">Productos que podrían interesarte</h4>
  <div class="row g-4">
    <?php foreach ($productos as $index => $producto): ?>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="<?= $producto['imagen'] ?>" class="card-img-top" alt="<?= $producto['titulo'] ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $producto['titulo'] ?></h5>
            <p class="card-text"><?= $producto['descripcion'] ?></p>
            <p class="text-success fw-bold">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
            <div class="mt-auto">
              <a href="<?= $producto['pagina'] ?>" class="btn btn-outline-primary w-100">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
  <footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">Ayuda</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
