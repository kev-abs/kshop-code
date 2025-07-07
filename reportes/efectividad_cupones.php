<?php
//  Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<?php
//  Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Efectividad de Cupones - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      background-color: #ffffff;
      color: #000000;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .nav-link {
      color: #000000 !important;
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-link:hover {
      color: #ffffff !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
    }
    .nav-link.text-warning:hover {
      background-color: #dc3545;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
    .carousel img {
      object-fit: cover;
      height: 500px;
      filter: brightness(85%);
    }
  </style>

</head>
<body class="bg-light">

 <div class="container-fluid">
  <div class="row">
    <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
       <div class="d-flex justify-content-between align-items-center">
        <!-- LOGO a la izquierda -->
        <div class="d-flex align-items-center">
          <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="60" class="me-2">
          <a href="./index.php" class="text-decoration-none fs-6 fw-bold text-white">K-SHOP</a>
        </div>
        <!-- TÍTULO centrado -->
      <h2 class="m-0 text-center felx-grow-1">Efectividad de Cupones</h2>
      <!-- Botón volver alineado a la izquierda con estilo mejorado -->
          <nav style="background-color: rgb(0, 0, 0);" class="px-3 py-2">
            <ul class="nav justify-content-end">
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

<div class="container mt-5">
  <!-- Tabla de cupones -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>Código del Cupón</th>
          <th>Descuento (%)</th>
          <th>Total Usos</th>
        </tr>
      </thead>
    </table>
</div>
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
