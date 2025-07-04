<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cambiar_estado"])) {
  $id = $_POST["cambiar_estado_id"];
  $nuevo_estado = $_POST["nuevo_estado"];

  $conexion->query("UPDATE producto SET Estado = '$nuevo_estado' WHERE ID_Producto = $id");

  header("Location: Admin_productos.php");
  exit();
}


// Agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $id_proveedor = $_POST["id_proveedor"];

  // Procesar imagen
  $imagen = null;
  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaDestino = "../Imagenes/" . $nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    $imagen = $nombreImagen;
  }

  $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Stock, ID_Proveedor, Imagen)
          VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_proveedor', '$imagen')";
  if ($conexion->query($sql)) {
    echo "<script>alert('✅ Producto agregado exitosamente.'); window.location.href = 'Productos.php';</script>";
    exit();
  } else {
    echo "<script>alert('❌ Error al agregar producto.');</script>";
  }
}

// Editar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
  $id = $_POST["id"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $id_proveedor = $_POST["id_proveedor"];
  $imagen = $_POST['imagen_actual'];

  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaDestino = "../Imagenes/" . $nombreImagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    $imagen = $nombreImagen;
  }

  $sql = "UPDATE producto SET 
          Nombre='$nombre', Descripcion='$descripcion', Precio='$precio',
          Stock='$stock', ID_Proveedor='$id_proveedor', Imagen='$imagen'
          WHERE ID_Producto=$id";
  $conexion->query($sql);

  header("Location: Admin_productos.php");
  exit();
}

$resultado = $conexion->query("SELECT * FROM producto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Admin-productos</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Tu hoja de estilos -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .header-custom {
      background-color: #000;
      color:#000;
    }
    .header-custom a.nav-link {
      color: #fff;
      transition: color 0.3s;
    }
    .header-custom a.nav-link:hover {
      color: #ffc107;
    }
    .logo-text {
      font-weight: bold;
      font-size: 1.4rem;
    }
  </style>
</head>
<<<<<<< HEAD
<body>

<!-- ENCABEZADO -->
<header class="header-custom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <i class="bi bi-shop me-2 fs-4 text-warning"></i>
      <span class="logo-text text-light">K-SHOP</span>
    </div>

    <!-- Buscador -->
    <form action="/buscar" method="GET" class="d-none d-md-flex w-25">
      <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar...">
    </form>

    <!-- Navegación -->
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a href="./carrito.php" class="nav-link">
            <i class="bi bi-cart-fill text-warning"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="../index.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="./Productos.php" class="nav-link">Productos</a>
        </li>
        <li class="nav-item">
          <a href="./servicios.php" class="nav-link">Servicios</a>
        </li>
        <li class="nav-item">
          <a href="./contactos.php" class="nav-link">Contáctanos</a>
        </li>
        <li class="nav-item">
          <a href="./Iniciarsesion.php" class="nav-link text-warning">
            <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

=======
>>>>>>> 3ddb9f2e8ed250501425025a78badd8932b6cb28
<body class="container py-5">
  <h1 class="mb-4">🛠️ Panel de administrador - Productos</h1>

  <!-- Formulario para agregar -->
  <form method="POST" enctype="multipart/form-data" class="mb-5">
    <h4>Agregar nuevo producto</h4>
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" required>
    <textarea name="descripcion" placeholder="Descripción" class="form-control mb-2" required></textarea>
    <input type="number" name="precio" placeholder="Precio" class="form-control mb-2" required>
    <input type="number" name="stock" placeholder="Stock" class="form-control mb-2" required>
    <input type="number" name="id_proveedor" placeholder="ID Proveedor" class="form-control mb-2" required>
    <input type="file" name="imagen" accept="image/*" class="form-control mb-2">
    <button type="submit" name="agregar" class="btn btn-success">Agregar Producto</button>
  </form>

  <!-- Tabla de productos -->
  <h4>Productos actuales</h4>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Proveedor</th><th>Imagen</th><th>Acción</th>
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
          <td><img src="../Imagenes/<?= $row['Imagen'] ?>" alt="Imagen" width="50"></td>
          <td>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row["ID_Producto"] ?>">Editar</button>
          </td>
        </tr>

        <!-- Modal para editar -->
        <div class="modal fade" id="edit<?= $row["ID_Producto"] ?>" tabindex="-1">
          <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data" class="modal-content">
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
                <input type="hidden" name="imagen_actual" value="<?= $row['Imagen'] ?>">
                <label>Imagen actual:</label><br>
                <img src="../Imagenes/<?= $row['Imagen'] ?>" alt="Imagen" width="100" class="mb-2"><br>
                <input type="file" name="imagen" accept="image/*" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="submit" name="editar" class="btn btn-primary">Guardar cambios</button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>