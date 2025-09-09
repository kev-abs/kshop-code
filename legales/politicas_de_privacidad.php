<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Política de Privacidad - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f7fa;
      color: #000000;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1;
    }
    .policy-card {
      background-color: #ffffff;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
    }
    h1, h4 {
      color: #222222;
    }
    ul li {
      margin-bottom: 0.5rem;
    }
    a:hover {
      text-decoration: underline;
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
      <a href="../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="../Barra de navegacion/Productos.php" class="nav-link text-dark">Productos</a>
      <a href="../Barra de navegacion/servicios.php" class="nav-link text-dark">Servicios</a>
      <!-- CARRITO -->
      <a href="../Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>

      <!-- INICIAR SESIÓN -->
      <a href="../Barra de navegacion/Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>


<main class="flex-fill d-flex justify-content-center align-items-start py-5">
  <div class="policy-card w-100" style="max-width: 900px;">
    <h1 class="mb-4 text-center fw-bold">Política de Privacidad</h1>
    <p>En K-SHOP valoramos tu privacidad. Esta política explica cómo recopilamos, usamos y protegemos tu información personal.</p>

    <h4 class="mt-4">1. Información que recopilamos</h4>
    <ul>
      <li>Datos personales (nombre, correo electrónico, teléfono) que proporcionas al registrarte.</li>
      <li>Información de compras, navegación y comportamiento dentro del sitio.</li>
    </ul>

    <h4 class="mt-3">2. Uso de la información</h4>
    <ul>
      <li>Para gestionar tu cuenta y pedidos.</li>
      <li>Mejorar nuestros servicios y personalizar tu experiencia.</li>
      <li>Enviar notificaciones, promociones o encuestas (solo si lo autorizas).</li>
    </ul>

    <h4 class="mt-3">3. Protección de datos</h4>
    <p>Implementamos medidas técnicas y organizativas para garantizar la seguridad de tus datos personales y prevenir accesos no autorizados.</p>

    <h4 class="mt-3">4. Cookies</h4>
    <p>Utilizamos cookies para analizar el tráfico y mejorar la navegación. Puedes configurar tu navegador para rechazarlas si lo deseas.</p>

    <h4 class="mt-3">5. Compartir datos</h4>
    <p>No vendemos ni compartimos tu información personal con terceros, salvo requerimientos legales o proveedores autorizados para el funcionamiento de K-SHOP.</p>

    <h4 class="mt-3">6. Tus derechos</h4>
    <p>Puedes acceder, rectificar o eliminar tus datos personales contactándonos a través del correo oficial de la tienda.</p>

    <h4 class="mt-3">7. Cambios en esta política</h4>
    <p>Podemos actualizar esta política ocasionalmente. Te notificaremos sobre los cambios más importantes.</p>

    <p class="mt-4 text-end"><strong>Última actualización:</strong> julio de 2025</p>
  </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <div class="mb-3">
      <a href="terminos.php" class="text-white me-3">Términos y condiciones</a>
      <a href="privacidad.php" class="text-white me-3">Política de privacidad</a>
      <a href="#" class="text-white me-3">Ayuda</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
