<?php
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel del Cliente - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

<!-- Encabezado personalizado para el cliente -->
<div class="header d-flex justify-content-between align-items-center p-3" style="background-color:rgb(168, 192, 193); color: white;">
  <div class="logo fw-bold fs-3">K-SHOP</div>
  <form action="/buscar" method="GET" class="d-flex" style="max-width: 300px;">
    <input type="text" name="q" placeholder="Buscar productos..." class="form-control me-2" />
  </form>
  <nav>
    <ul class="nav">
      <li class="nav-item"><a href="../php/perfil_cliente.php" class="nav-link text-dark fw-bold">Perfil</a></li>
      <li class="nav-item"><a href="pedidos.php" class="nav-link text-dark fw-bold">Mis pedidos</a></li>
      <li class="nav-item"><a href="lista_deseos.php" class="nav-link text-dark fw-bold">Lista de deseos</a></li>
      <li class="nav-item"><a href="carrito.php" class="nav-link text-dark fw-bold">Mi carrito</a></li>
      <li class="nav-item"><a href="../php/cerrarsesion.php" class="btn  fw-bold">Cerrar Sesión</a></li>
    </ul>
  </nav>
</div>

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
