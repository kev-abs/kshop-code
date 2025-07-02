<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contacto - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/stilos.css" />
</head>
<body>

  <!-- Encabezado -->
  <div class="header">
    <div class="logo">K-SHOP</div>
    <form action="/buscar" method="GET" class="buscar-formulario">
      <input type="text" name="q" placeholder="Buscar..." />
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

  <!-- Sección de contacto con grid -->
  <section class="contacto-grid">
    <h1>Contáctanos</h1>
    <form class="formulario-grid">
      <div class="campo">
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />
      </div>

      <div class="campo">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" placeholder="Tu correo" required />
      </div>

      <div class="campo mensaje">
        <textarea id="mensaje" name="mensaje" rows="6" placeholder="Escribe tu mensaje aquí..." required></textarea>
      </div>

      <div class="campo boton-enviar">
        <button type="submit">Enviar mensaje</button>
      </div>
    </form>
  </section>
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
