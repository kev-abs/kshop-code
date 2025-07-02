<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carrito de Compras - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body onload="verificarAcceso('cliente'); mostrarCarrito();">

  <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="form-busqueda">
      <input type="text" name="q" placeholder="Buscar..." />
      <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" viewBox="0 0 24 24">
          <path d="M21.71 20.29l-3.4-3.4A9 9 0 1 0 18 19.6l3.4 3.4a1 1 0 0 0 1.41-1.41zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"/>
        </svg>
      </button>
    </form>
    <nav class="navbar">
      <ul>
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="Productos.php">Productos</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contactos.php">Contacto</a></li>
        <li><a href="Iniciarsesion.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
      </ul>
    </nav>
  </div>

  <!-- Contenido principal del carrito -->
  <div class="carrito">
    <h1>Carrito de Compras</h1>

    <!-- Lista de productos agregados -->
    <div id="lista-carrito"></div>

    <!-- Total y botones -->
    <div class="carrito-total">
      <h2>Total: <span id="total-carrito">$0</span></h2>

      <div class="botones-carrito">
        <button onclick="finalizarCompra()">Comprar</button>
        <button onclick="localStorage.removeItem('carrito'); mostrarCarrito()">Vaciar Carrito</button>
      </div>
    </div>
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
