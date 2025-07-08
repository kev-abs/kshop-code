<?php
session_start();

// Protección opcional (puedes activarla si lo necesitas)
// if (!isset($_SESSION['rol'])) {
//     header("Location: ../index.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Centro de Ayuda - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
      background-color: #ffffff;
      color: #000000;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- CERRAR SESIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="../index.PHP" class="nav-link">
        Volver
      </a>
    </nav>
  </div>
</header>

<!-- CONTENIDO -->
<main class="container py-5">
  <h1 class="mb-4 text-center">Centro de Ayuda K-SHOP</h1>

  <div class="accordion" id="acordeonAyuda">

    <div class="accordion-item">
      <h2 class="accordion-header" id="pregunta1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta1" aria-expanded="true">
          ¿Cómo me registro en K-SHOP?
        </button>
      </h2>
      <div id="respuesta1" class="accordion-collapse collapse show" data-bs-parent="#acordeonAyuda">
        <div class="accordion-body">
          Dirígete a la página principal y haz clic en “Registrarse”, luego completa el formulario con tus datos personales.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="pregunta2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta2">
          ¿Cómo realizo una compra?
        </button>
      </h2>
      <div id="respuesta2" class="accordion-collapse collapse" data-bs-parent="#acordeonAyuda">
        <div class="accordion-body">
          Navega por el catálogo de productos, agrega al carrito los que desees y finaliza la compra desde el carrito de compras.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="pregunta3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta3">
          ¿Cómo contacto al soporte?
        </button>
      </h2>
      <div id="respuesta3" class="accordion-collapse collapse" data-bs-parent="#acordeonAyuda">
        <div class="accordion-body">
          Puedes escribirnos al correo soporte@kshop.com o llamarnos al 300 000 0000.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="pregunta4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta4">
          ¿Puedo devolver un producto?
        </button>
      </h2>
      <div id="respuesta4" class="accordion-collapse collapse" data-bs-parent="#acordeonAyuda">
        <div class="accordion-body">
          Sí. Consulta nuestra Política de Devoluciones para conocer las condiciones aplicables y el procedimiento.
        </div>
      </div>
    </div>

  </div>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4">
  <div class="container">
    <div class="mb-3">
      <a href="../legales/Terminos_de_uso.php" class="text-white me-3">Términos y condiciones</a>
      <a href="../legales/politicas_de_privacidad.php" class="text-white me-3">Política de privacidad</a>
      <a href="../legales/ayuda.php" class="text-white me-3">Ayuda</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-SHOP - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
