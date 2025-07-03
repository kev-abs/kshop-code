<?php
$productos = [
  [
    "titulo" => "Camiseta manga corta dama",
    "descripcion" => "Fresca y cómoda para el día a día.",
    "imagen" => "../Imagenes/camiseta aqua manga corta mujer.avif",
    "pagina" => "producto1.php"
  ],
  [
    "titulo" => "Camiseta manga corta caballero",
    "descripcion" => "Ideal para climas cálidos y casuales.",
    "imagen" => "../Imagenes/camiseta negra manga corta hombre.jpg",
    "pagina" => "producto2.php"
  ],
  [
    "titulo" => "Buzo dama",
    "descripcion" => "Perfecto para el clima frío.",
    "imagen" => "../Imagenes/camiseta blanca manga larga mujer.jpg",
    "pagina" => "producto3.php"
  ],
  [
    "titulo" => "Buzo caballero",
    "descripcion" => "Diseño moderno y cálido.",
    "imagen" => "../Imagenes/camiseta negra manga larga hombre.webp",
    "pagina" => "producto4.php"
  ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Productos - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

<div class="header">
  <div class="logo">K-SHOP</div>
  <form action="/buscar" method="GET" class="buscar-formulario">
    <input type="text" name="q" placeholder="Buscar productos..." />
  </form>
  <nav class="navbar">
    <ul>
      <li><a href="../index.php">Inicio</a></li>
      <li><a href="Productos.php">Productos</a></li>
      <li><a href="servicios.php">Servicios</a></li>
      <li><a href="contactos.php">Contáctanos</a></li>
      <li><a href="Iniciarsesion.php">Iniciar Sesión</a></li>
    </ul>
  </nav>
</div>

<div class="productos text-center my-5">
  <h1>Nuestros Productos</h1>
  <div class="container">
    <div class="row g-4">
      <?php foreach ($productos as $producto): ?>
        <div class="col-6 col-md-4">
          <div class="card h-100">
            <img src="<?= $producto['imagen'] ?>" class="card-img-top" alt="<?= $producto['titulo'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $producto['titulo'] ?></h5>
              <p class="card-text"><?= $producto['descripcion'] ?></p>
              <a href="<?= $producto['pagina'] ?>" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
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

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
