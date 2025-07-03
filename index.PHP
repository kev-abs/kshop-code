<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Sistema de Gestión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="Estilos/stilos.css" />
</head>
<body>

  <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>

    <!-- Formulario de búsqueda -->
    <form action="/buscar" method="GET">
      <input type="text" name="q" placeholder="Buscar..." />
</form>

    </form>

    <!-- Barra de navegación -->
    <nav class="navbar">
      <ul>
        <li><a href="./Barra de navegacion/carrito.php" class="boton-blanco">+</a></li>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="./Barra de navegacion/Productos.php">Productos</a></li>
        <li><a href="./Barra de navegacion/servicios.php">Servicios</a></li>
        <li><a href="./Barra de navegacion/contactos.php">Contáctanos</a></li>
        <li><a href="Barra de navegacion/Iniciarsesion.php">Iniciar sesion</a></li>
      </ul>
    </nav>

  </div>

  <!--CARRUSEL-->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" ID="carousel">
  <div class="carousel-inner fst-italic">
    <div class="carousel-item active">
      <img src="./Imagenes/ropa caballero.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa dama.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Imagenes/ropa niño.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-muted">
        <h2>Bienvenido a K-Shop</h2>
        <p>¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
  </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <script src="../Funciones/funciones.js" defer></script>
</body>
</html>
