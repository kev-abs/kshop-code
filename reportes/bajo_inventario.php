<?php
// Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<?php
// Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos con Bajo Inventario - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

   <!-- Título -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
        <h2 class="m-0">Productos con Bajo Inventario</h2>
        <!-- Botón volver alineado a la izquierda con estilo mejorado -->
          <nav style="background-color: rgb(0, 0, 0);" class="px-3 py-2">
            <ul class="nav">
              <li class="nav-item">
                <a href="../paneles/paneladmin.php"
                  style="color: white; font-weight: 600; font-size: 1rem; text-decoration: none;"
                  onmouseover="this.style.color='#FFD700'"
                  onmouseout="this.style.color='white'">
                  <i class="bi bi-arrow-left-circle-fill me-1"></i> volver
                </a>
              </li>
            </ul>
          </nav>
      </div>
    </div>
  </div>

  <div class="container">
  <!--  Tabla -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>ID Producto</th>
          <th>Nombre</th>
          <th>Stock Actual</th>
        </tr>
      </thead>
    </table>
</div>
  </div>
<!-- FOOTER -->
<footer class="bg-dark text-white text-center text-md-start py-5">
    <div class="container-fluid">
      <div class="row px-4">
        <div class="col-md-3 mb-3">
          <h5>K-SHOP</h5>
          <p>Tu tienda de moda en línea con lo mejor en estilo, comodidad y precio. ¡Gracias por elegirnos!</p>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Enlaces rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Inicio</a></li>
            <li><a href="#" class="text-white">Productos</a></li>
            <li><a href="#" class="text-white">Servicios</a></li>
            <li><a href="#" class="text-white">Contáctanos</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Legal</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Términos y condiciones</a></li>
            <li><a href="#" class="text-white">Política de privacidad</a></li>
            <li><a href="#" class="text-white">Cookies</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Contáctanos</h5>
          <p><i class="bi bi-envelope"></i> contacto@kshop.com</p>
          <p><i class="bi bi-telephone"></i> +57 301 000 0000</p>
          <p><i class="bi bi-geo-alt"></i> Bogotá, Colombia</p>
        </div>
      </div>
      <hr class="border-light">
      <p class="mb-0 text-center">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
    </div>
</footer>
</body>
</html>
