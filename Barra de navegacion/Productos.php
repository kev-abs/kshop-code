<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");
$resultado = $conexion->query("SELECT * FROM producto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Productos</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Tu hoja de estilos -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .header-custom {
      background-color: #000;
      color:#000;
    }
    .header-custom a.nav-link {
      color: #fff;
      transition: color 0.3s;
    }
    .header-custom a.nav-link:hover {
      color: #ffc107;
    }
    .logo-text {
      font-weight: bold;
      font-size: 1.4rem;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="header-custom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <i class="bi bi-shop me-2 fs-4 text-warning"></i>
      <span class="logo-text text-light">K-SHOP</span>
    </div>

    <!-- Buscador -->
    <form action="/buscar" method="GET" class="d-none d-md-flex w-25">
      <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar...">
    </form>

    <!-- Navegación -->
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a href="./carrito.php" class="nav-link">
            <i class="bi bi-cart-fill text-warning"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="../index.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="./Productos.php" class="nav-link">Productos</a>
        </li>
        <li class="nav-item">
          <a href="./servicios.php" class="nav-link">Servicios</a>
        </li>
        <li class="nav-item">
          <a href="./contactos.php" class="nav-link">Contáctanos</a>
        </li>
        <li class="nav-item">
          <a href="./Iniciarsesion.php" class="nav-link text-warning">
            <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<div class="productos text-center my-5">
  <h1>Nuestros Productos</h1>
  <div class="container">
    <div class="row g-4">
      <?php $index = 0; while ($producto = $resultado->fetch_assoc()): ?>
        <div class="col-6 col-md-4">
          <div class="card h-100">
            <img src="../Imagenes/<?= htmlspecialchars($producto['Imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['Nombre']) ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($producto['Nombre']) ?></h5>
              <p class="card-text">$<?= number_format($producto['Precio'], 0, ',', '.') ?></p>
              <button class="btn btn-primary mt-auto w-100" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $index ?>">Ver más</button>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalProducto<?= $index ?>" tabindex="-1" aria-labelledby="modalProductoLabel<?= $index ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?= htmlspecialchars($producto['Nombre']) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body text-start">
                <img src="../Imagenes/<?= htmlspecialchars($producto['Imagen']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($producto['Nombre']) ?>">
                <p><strong>Descripción:</strong> <?= htmlspecialchars($producto['Descripcion']) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($producto['Precio'], 0, ',', '.') ?></p>
              </div>
              <div class="modal-footer">
                <a href="producto1.php" class="btn btn-secondary">Detalles</a>
                <button class="btn btn-success"
                  onclick='agregarAlCarrito({
                    id: <?= $producto["ID_Producto"] ?>,
                    nombre: <?= json_encode($producto["Nombre"]) ?>,
                    descripcion: <?= json_encode($producto["Descripcion"]) ?>,
                    precio: <?= $producto["Precio"] ?>,
                    imagen: <?= json_encode("../Imagenes/" . $producto["Imagen"]) ?>
                  })'>Agregar al carrito</button>
              </div>
            </div>
          </div>
        </div>
      <?php $index++; endwhile; ?>
    </div>

    <div class="text-center mt-5">
      <a href="carrito.php" class="btn btn-warning">Ir al carrito</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>