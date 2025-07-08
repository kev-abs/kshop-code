<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Términos y Condiciones - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    main {
      min-height: 75vh;
    }
    .logo-text {
      font-weight: bold;
      font-size: 1.4rem;
    }
    .nav-link {
      color: #000 !important;
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-link:hover {
      color: #fff !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
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

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="../index.PHP" class="nav-link">
        Volver
      </a>
    </nav>
  </div>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="container my-5">
  <h2 class="mb-4 text-center">Términos y Condiciones de Uso</h2>
  <div class="card shadow-sm border-start border-5 border-warning">
    <div class="card-body">
      <p>Bienvenido a K-SHOP. Al acceder y utilizar nuestro sitio web, aceptas cumplir con los siguientes términos y condiciones:</p>
      <ul>
        <li><strong>1. Uso del sitio:</strong> El contenido de este sitio es para tu uso personal y no comercial.</li>
        <li><strong>2. Cuenta de usuario:</strong> Eres responsable de mantener la confidencialidad de tu cuenta y contraseña.</li>
        <li><strong>3. Compras y pagos:</strong> Todas las transacciones están sujetas a verificación de disponibilidad y aprobación de pago.</li>
        <li><strong>4. Envíos:</strong> K-SHOP no se hace responsable por retrasos causados por terceros (transportadoras).</li>
        <li><strong>5. Devoluciones:</strong> Consulta nuestra política de devoluciones disponible en la sección de Ayuda.</li>
        <li><strong>6. Propiedad intelectual:</strong> Todos los derechos reservados. Ningún contenido podrá ser reproducido sin autorización.</li>
        <li><strong>7. Cambios:</strong> Nos reservamos el derecho de modificar estos términos sin previo aviso.</li>
      </ul>
      <p>Para más información, contáctanos a través de nuestro correo <a href="mailto:soporte@kshop.com">soporte@kshop.com</a>.</p>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
