<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Carrito de compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>

<body>

  <!-- Encabezado -->
  <header class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="form-busqueda">
      <input type="text" name="q" placeholder="Buscar..." />
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="Productos.php">Productos</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contactos.php">Contacto</a></li>

      </ul>
    </nav>
  </header>

  <!-- Contenido principal del carrito -->
  <main class="carrito">
    <h1>Carrito de Compras</h1>


    <!-- Tarjeta de producto simulada -->
    <div class="d-flex justify-content-center">
      <div class="card mb-4" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../Imagenes/camiseta boxy.jpeg" class="img-fluid rounded-start" alt="Producto"
              style="background-color: #f0f0f0; height: 100%; width: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title fw-bold">0 COP</h5>
              <p class="card-text">Descripción</p>
              <p class="card-text"><small class="text-muted">Talla: #</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Total y botones -->
    <div class="botones-carrito">
      <!-- Botón COMPRAR -->
      <form action="../compra/metodo de envio.php" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-primary">Comprar</button>
      </form>
      <form action="#">
        <button type="submit" class="btn btn-secondary">Vaciar Carrito</button>
      </form>
    </div>
  </main>

  <!--FOOTER-->
  <footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white me-3">Términos y condiciones</a>
        <a href="#" class="text-white me-3">Política de privacidad</a>
        <a href="#" class="text-white me-3">¿Necesitas ayuda?</a>
      </div>
      <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
  </footer>

  <script src="../Funciones/funciones.js" defer></script>
</body>

</html>