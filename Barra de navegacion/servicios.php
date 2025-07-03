<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Servicios - K-SHOP</title>
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

  <!-- Servicios -->
  <section class="servicios">
    <h1>Servicios disponibles en Bogotá</h1>
    <div class="servicios-grid">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <h3>Envíos Rápidos en Bogotá</h3>
            <p>Realizamos entregas el mismo día dentro de Bogotá para pedidos hechos antes del mediodía.</p>
          </div>
        </div>

        <div class="cold-md-3">
          <div class="servicio">
            <h3>Asesoría Personalizada</h3>
            <p>Contamos con asesores disponibles en la ciudad para ayudarte a elegir el mejor producto.</p>
          </div>
        </div>
        
        <div class="cold-md-3">
          <div class="servicio">
            <h3>Hoy no fio mañana shi</h3>
            <p>Las devoluciones se recogen directamente en tu domicilio en Bogotá, sin costo adicional.</p>
          </div>
        </div>

        <div class="cold-md-3">
          <div class="servicio">
            <h3>Soporte Técnico Local</h3>
            <p>Servicio técnico con cobertura total en Bogotá, incluyendo visitas domiciliarias si es necesario.</p>
          </div>
        </div>

        <div class="cold-md-3">
          <div class="servicio">
            <h3>Capacitación y Formación</h3>
            <p>Ofrecemos talleres y capacitaciones gratuitas presenciales en nuestra sede de Bogotá sobre el uso de productos tecnológicos.</p>
          </div>
        

          <div class="servicio">
            <h3>Programación de Pedidos</h3>
            <p>Puedes programar tus pedidos para fechas y horarios específicos dentro de la capital.</p>
          </div>

        </div>
      </div>
    </div>
      
    </div>
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
