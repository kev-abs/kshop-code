<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Productos - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

  <!-- Encabezado -->
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

  <!-- Contenido principal -->
  <div class="productos text-center">
    <h1>Nuestros Productos</h1>

    <div class="container">
  <div class="row">
    <div class="col-6 col-md-4">
      <div class="card">
        <img src="../Imagenes/camiseta aqua manga corta mujer.avif" class="card-img-top" alt="Producto 1">
        <div class="card-body">
          <h5 class="card-title">Camiseta manga corta dama</h5>
          <p class="card-text">Descripción del producto 1.</p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-4">
      <div class="card">
        <img src="../Imagenes/camiseta negra manga corta hombre.jpg" class="card-img-top" alt="Producto 2">
        <div class="card-body">
          <h5 class="card-title">Camiseta manga corta caballero</h5>
          <p class="card-text">Descripción del producto 2.</p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-4">
      <div class="card">
        <img src="../Imagenes/camiseta blanca manga larga mujer.jpg" class="card-img-top" alt="Producto 3">
        <div class="card-body">
          <h5 class="card-title">Buzo dama</h5>
          <p class="card-text">Descripción del producto 3.</p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-4">
      <div class="card">
        <img src="../Imagenes/camiseta negra manga larga hombre.webp" class="card-img-top" alt="Producto 3">
        <div class="card-body">
          <h5 class="card-title">Buzo caballero</h5>
          <p class="card-text">Descripción del producto 3.</p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Puedes seguir agregando más productos aquí -->

  </div>
  <!--FOOTER-->
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
