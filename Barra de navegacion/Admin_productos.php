<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");

// Agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $id_proveedor = $_POST["id_proveedor"];

  $imagen = null;
  if (isset($_FILES['imagen']) && is_uploaded_file($_FILES['imagen']['tmp_name'])) {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  }

  $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Proveedor, Imagen)
          VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_proveedor', '$imagen')";
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
  <title>K-SHOP - Admin Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #fff; color: #000; }
    header { background-color: #fff; border-bottom: 1px solid #dee2e6; }
    .nav-link { color: #000; margin-left: 1rem; }
    .nav-link:hover { color: #0d6efd; }
    .btn-outline-dark:hover { background-color: #0d6efd; color: white; }
    .btn-outline-danger:hover { background-color: #dc3545; color: white; }
    .form-control, .btn { border-radius: 0.5rem; }
    table { background-color: #f8f9fa; }
    img.thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
  </style>
</head>
<body>

<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a href="../index.php" class="text-decoration-none fs-4 fw-bold text-dark">K-SHOP</a>
    </div>
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>
    <nav class="d-flex align-items-center gap-3">
      <a href="./Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <a href="./carrito.php" class="btn btn-outline-dark border-0"><i class="bi bi-cart-fill"></i></a>
      <a href="./Iniciarsesion.php" class="btn btn-outline-dark border-0 text-dark"><i class="bi bi-person-circle me-1"></i>Iniciar Sesión</a>
    </nav>
  </div>
</header>

<div class="container py-5">
  <h1 class="mb-4">🛠️ Panel de administrador - Productos</h1>

  <!-- Formulario agregar -->
  <form method="POST" class="mb-5" enctype="multipart/form-data">
    <h4 class="mb-3">Agregar nuevo producto</h4>
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" required>
    <textarea name="descripcion" placeholder="Descripción" class="form-control mb-2" required></textarea>
    <input type="number" name="precio" placeholder="Precio" class="form-control mb-2" required>
    <input type="number" name="stock" placeholder="Stock" class="form-control mb-2" required>
    <input type="number" name="id_proveedor" placeholder="ID Proveedor" class="form-control mb-2" required>
    <input type="file" name="imagen" class="form-control mb-2" accept="image/*" required>
    <button name="agregar" class="btn btn-success">Agregar Producto</button>
  </form>

  <!-- Tabla de productos -->
  <h4>Productos actuales</h4>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Proveedor</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $row["ID_Producto"] ?></td>
            <td><img src="ver_imagen.php?id=<?= $row['ID_Producto'] ?>" alt="Imagen" class="thumb"></td>
            <td><?= $row["Nombre"] ?></td>
            <td>$<?= number_format($row["Precio"], 0, ',', '.') ?></td>
            <td><?= $row["Stock"] ?></td>
            <td><?= $row["ID_Proveedor"] ?></td>
          
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
  </div>

  <div class="text-start mt-3">
    <a href="../Paneles/paneladmin.php" class="btn btn-outline-secondary">Volver al panel</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
