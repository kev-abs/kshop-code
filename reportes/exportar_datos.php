<?php
//  Validar sesión como administrador
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
  <title>Exportar Datos - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* === Estilos personalizados para la tabla === */
    .tabla-estilizada {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tabla-estilizada tbody tr:nth-child(odd) {
      background-color: #f8f9fa;
    }

    .tabla-estilizada tbody tr:hover {
      background-color: #e9ecef;
    }

    /* === Alinear botón volver al panel === */
    .btn-volver {
      margin-top: 0.2rem;
    }
  </style>
</head>
<body class="bg-light">

<div class="container-fluid">
  <div class="row">
    <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
      <h2 class="m-0">Exportar Datos</h2>
    </div>
  </div>
</div>
  <!-- INICIO - Desplegable de ayuda con ícono -->
  <div class="d-flex justify-content-end mt-2 me-3">
    <div class="accordion w-auto" id="infoExportar">
      <div class="accordion-item border-0">
        <h2 class="accordion-header" id="infoHeading">
          <button class="accordion-button collapsed bg-white text-dark py-1 px-2 rounded-pill border border-warning"
                  type="button" data-bs-toggle="collapse" data-bs-target="#infoCollapse"
                  aria-expanded="false" aria-controls="infoCollapse" style="font-size: 0.85rem;">
            <i class="bi bi-question-circle-fill"></i>
          </button>
        </h2>
        <div id="infoCollapse" class="accordion-collapse collapse" aria-labelledby="infoHeading" data-bs-parent="#infoExportar">
          <div class="accordion-body py-2 px-3" style="font-size: 0.8rem;">
            Puedes exportar los datos en formatos <strong>PDF</strong>, <strong>Excel</strong>, <strong>CSV</strong> o <strong>Word</strong>. 
            Haz clic en uno de los botones para generar el archivo.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Botones de exportación -->
  <!-- INICIO - Botones centrados del mismo tamaño -->
  <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
    <div class="row w-75">
      <div class="col-md-6 mb-3">
        <a href="#" class="btn btn-white border-warning border-2 btn-lg w-100 h-100 d-flex align-items-center justify-content-center shadow py-4">
          <i class="bi bi-download me-2"></i> Exportar Ventas
        </a>
      </div>
      <div class="col-md-6 mb-3">
        <a href="#" class="btn btn-white border-warning border-2 btn-lg w-100 h-100 d-flex align-items-center justify-content-center shadow py-4">
          <i class="bi bi-box-seam me-2"></i> Exportar Inventario
        </a>
      </div>
    </div>
  </div>

      <!-- INICIO - Botón de volver arriba del footer -->
  <div class="container-fluid">
    <div class="row">
      <div class="col text-end py-3">
        <a href="../paneles/paneladmin.php" class="btn btn-secondary shadow">
          ← Volver
        </a>
      </div>
    </div>
  </div>

</div>
<!-- FOOTER -->
<footer class="bg-dark text-white text-center text-md-start py-5">
  <div class="container">
    <div class="row">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
