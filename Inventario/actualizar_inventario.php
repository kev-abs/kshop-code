<?php
include '../conexion/conexion.php';
session_start();

// Si se envía el formulario (POST), actualiza los datos del producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nuevo_stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    // Consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("UPDATE producto SET Stock = ?, Descripcion = ?, Estado = ? WHERE ID_Producto = ?");
    $stmt->bind_param("issi", $nuevo_stock, $descripcion, $estado, $id);

    if ($stmt->execute()) {
        // Redirige a la misma página con mensaje de éxito (sin romper rutas)
        header("Location: " . $_SERVER['PHP_SELF'] . "?exito=1");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}

// Obtener productos para mostrar en la tabla
$resultado = $conexion->query("SELECT ID_Producto, Nombre, Stock, Descripcion, Estado FROM producto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar Existencias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
   <style>
    body {
      background-color: #f8f9fa; /* fondo claro */
      color: #000;
    }

    .tabla-inventario {
      border-collapse: collapse;
      width: 100%;
    }

    .tabla-inventario th {
      background-color: #ffc107;
      color: black;
      border: 2px solid black;
      text-align: center;
      padding: 12px;
    }

    .tabla-inventario td {
      border: 2px solid black;
      text-align: center;
      padding: 10px;
    }

    .tabla-inventario tr:nth-child(even) {
      background-color: #fff;
    }

    .tabla-inventario tr:hover {
      background-color: #ffeeba;
    }

    .btn-primary {
      background-color: #ffc107;
      color: black;
      border: 1px solid black;
    }

    .btn-primary:hover {
      background-color: #e0a800;
      color: white;
    }

    .btn-secondary {
      background-color: #343a40;
      color: white;
    }

    h1 {
      font-weight: bold;
      color: #343a40;
      text-align: center;
      margin-bottom: 30px;
    }
  </style>


</head>
<body class="container py-5">
  <h1 class="mb-4 text-center fw-bold">Actualizar Inventario</h1>

  <?php if (isset($_GET['exito'])): ?>
    <div class="alert alert-success fade-alert d-flex align-items-center" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i>
      <div>¡Producto actualizado correctamente!</div>
    </div>
  <?php endif; ?>

  <table class="tabla-inventario">
    <thead class="table-dark">
      <tr>
        <th>Producto</th>
        <th>Stock</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
          <form method="POST">
            <td class="fw-semibold"><?= htmlspecialchars($row['Nombre']) ?></td>
            <td>
              <input type="number" name="stock" class="form-control" value="<?= $row['Stock'] ?>" min="0" required>
            </td>
            <td>
              <input type="text" name="descripcion" class="form-control" value="<?= htmlspecialchars($row['Descripcion']) ?>" required>
            </td>
            <td>
              <select name="estado" class="form-select" required>
                <option value="Disponible" <?= $row['Estado'] === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
                <option value="No disponible" <?= $row['Estado'] === 'No disponible' ? 'selected' : '' ?>>No disponible</option>
              </select>
            </td>
            <td>
              <input type="hidden" name="id" value="<?= $row['ID_Producto'] ?>">
              <button class="btn btn-primary w-100">
                <i class="bi bi-arrow-repeat me-1"></i>Actualizar
              </button>
            </td>
          </form>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <div class="text-center mt-4">
    <a href="../Paneles/paneladmin.php" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
