<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");

// Agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $id_proveedor = $_POST["id_proveedor"];

  $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Proveedor)
          VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_proveedor')";
  $conexion->query($sql);
}

// Editar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
  $id = $_POST["id"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $id_proveedor = $_POST["id_proveedor"];

  $sql = "UPDATE producto SET 
          Nombre='$nombre', Descripcion='$descripcion', Precio='$precio',
          Stock='$stock', ID_Proveedor='$id_proveedor'
          WHERE ID_Producto=$id";
  $conexion->query($sql);
}

// Obtener productos
$resultado = $conexion->query("SELECT * FROM producto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - admin-productos</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #fff;
      color: #000;
    }
    header {
      background-color: #fff;
      border-bottom: 1px solid #dee2e6;
    }
    .nav-link {
      color: #000;
      margin-left: 1rem;
    }
    .nav-link:hover {
      color: #0d6efd;
    }
    .btn-outline-dark:hover {
      background-color: #0d6efd;
      color: white;
    }
    .btn-outline-danger:hover {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>

<!-- ENCABEZADO -->
<header class="sticky-top py-3 shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">

    <!-- Logo -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo.png" alt="Logo" width="40" class="me-2">
      <a href="../index.php" class="fs-4 fw-bold text-dark text-decoration-none">K-SHOP</a>
    </div>

    <!-- Buscador -->
    <form action="/buscar" method="GET" class="d-none d-md-flex w-50 justify-content-center">
      <input type="text" name="q" class="form-control" placeholder="Buscar...">
    </form>

    <!-- Navegación -->
    <nav class="d-flex align-items-center">
      <a href="./carrito.php" class="btn btn-outline-dark border-0 me-2">
        <i class="bi bi-cart-fill"></i>
      </a>
      <a href="../index.php" class="nav-link">Inicio</a>
      <a href="./Productos.php" class="nav-link">Productos</a>
      <a href="./servicios.php" class="nav-link">Servicios</a>
      <a href="./contactos.php" class="nav-link">Contáctanos</a>
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 ms-2">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<div class="container py-5">
  <h1 class="mb-4">🛠️ Panel de administrador - Productos</h1>

  <!-- Formulario para agregar -->
  <form method="POST" class="mb-5">
    <h4>Agregar nuevo producto</h4>
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" required>
    <textarea name="descripcion" placeholder="Descripción" class="form-control mb-2" required></textarea>
    <input type="number" name="precio" placeholder="Precio" class="form-control mb-2" required>
    <input type="number" name="stock" placeholder="Stock" class="form-control mb-2" required>
    <input type="number" name="id_proveedor" placeholder="ID Proveedor" class="form-control mb-2" required>
    <button name="agregar" class="btn btn-success">Agregar Producto</button>
  </form>

  <!-- Tabla de productos -->
  <h4>Productos actuales</h4>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Proveedor</th><th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $row["ID_Producto"] ?></td>
          <td><?= $row["Nombre"] ?></td>
          <td>$<?= number_format($row["Precio"], 0, ',', '.') ?></td>
          <td><?= $row["Stock"] ?></td>
          <td><?= $row["ID_Proveedor"] ?></td>
          <td>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row["ID_Producto"] ?>">Editar</button>
          </td>
        </tr>

        <!-- Modal para editar -->
        <div class="modal fade" id="edit<?= $row["ID_Producto"] ?>" tabindex="-1">
          <div class="modal-dialog">
            <form method="POST" class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $row["ID_Producto"] ?>">
                <input type="text" name="nombre" value="<?= $row["Nombre"] ?>" class="form-control mb-2">
                <textarea name="descripcion" class="form-control mb-2"><?= $row["Descripcion"] ?></textarea>
                <input type="number" name="precio" value="<?= $row["Precio"] ?>" class="form-control mb-2">
                <input type="number" name="stock" value="<?= $row["Stock"] ?>" class="form-control mb-2">
                <input type="number" name="id_proveedor" value="<?= $row["ID_Proveedor"] ?>" class="form-control mb-2">
              </div>
              <div class="modal-footer">
                <button name="editar" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
      <?php endwhile; ?>
    </tbody>
  </table>
  <div class="col-md-4">
    <div><a href="../Paneles/paneladmin.php">Volver a panel</a></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
