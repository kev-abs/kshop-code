<?php
include '../conexion/conexion.php';
session_start();

// Consulta productos
$resultado = $conexion->query("SELECT ID_Producto, Nombre, Stock, Descripcion, Estado FROM producto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar Inventario</title>
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
<body class="bg-light">

  <div class="container py-5">
    <h1 class="text-center mb-4 fw-bold">Inventario de Productos</h1>

    <?php if ($resultado->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="tabla-inventario">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Descripción</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
              <tr>
                <td><?= $row['ID_Producto'] ?></td>
                <td class="fw-semibold"><?= htmlspecialchars($row['Nombre']) ?></td>
                <td><?= $row['Stock'] ?></td>
                <td><?= htmlspecialchars($row['Descripcion']) ?></td>
                <td>
                  <?php if ($row['Estado'] === 'Disponible'): ?>
                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Disponible</span>
                  <?php else: ?>
                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> No disponible</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-warning text-center shadow-sm">
        <i class="bi bi-exclamation-triangle-fill"></i> No hay productos registrados en el inventario.
      </div>
    <?php endif; ?>

    <div class="text-center mt-4">
      <a href="../Paneles/paneladmin.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver al Panel
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
