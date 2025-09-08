<?php
session_start();
include '../conexion/conexion.php';

// Verificar si el usuario está autenticado como cliente
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Obtener el ID del cliente desde la sesión
$id_cliente = $_SESSION["id_cliente"] ?? null;

// Si no se tiene el ID, redirigir
if (!$id_cliente) {
    echo "Error: sesión no válida.";
    exit();
}

// Obtener los datos actuales del cliente
$sql = "SELECT * FROM Cliente WHERE ID_Cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    echo "Cliente no encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Perfil - K-SHOP</title>
  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>
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
<body>

<!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">

      <!-- Volver al Panel -->
      <a href="./perfil_cliente.php" class="nav-link text-dark fw-semibold">Volver</a>
      <!-- Pedidos -->
      <a href="pedidos.php" class="nav-link text-dark fw-semibold">Mis pedidos</a>
      <!--Lista de deseos-->
      <a href="lista_deseos.php" class="nav-link text-dark fw-semibold">Lista de deseos</a>
      <!--Carrito-->
      <a href="../Barra de navegacion/carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>
      <!-- CERRAR SESIÓN-->
      <a href="../php/cerrarsesion.php" class="nav-link">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- Formulario -->
<div class="container mt-5">
  <h2 class="text-center mb-4">✏️ Editar Mi Perfil</h2>
  <form action="editar_perfil_cliente.php" method="POST" class="card p-4 shadow">
    <input type="hidden" name="id" value="<?= $cliente['ID_Cliente'] ?>">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($cliente['Nombre']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" class="form-control" name="correo" value="<?= htmlspecialchars($cliente['Correo']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono:</label>
      <input type="text" class="form-control" name="telefono" value="<?= htmlspecialchars($cliente['Telefono']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="documento" class="form-label">Documento:</label>
      <input type="text" class="form-control" name="documento" value="<?= htmlspecialchars($cliente['Documento']) ?>" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="perfil_cliente.php" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </div>
  </form>
</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
