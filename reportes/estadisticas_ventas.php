<?php
//  Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estadísticas de Ventas - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Encabezado del módulo -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
      <h2 class="m-0">Estadísticas de Ventas</h2>
    </div>
  </div>
</div>

<div class="container">

  <?php
  // Consultas generales
  $consultaVentas = "SELECT COUNT(*) AS total_ventas, SUM(Total) AS ingresos_totales FROM Pedido";
  $resultadoVentas = $conexion->query($consultaVentas);
  $datosVentas = $resultadoVentas->fetch_assoc();

  $consultaProductos = "SELECT SUM(Cantidad) AS productos_vendidos FROM Detalle_Pedido";
  $resultadoProductos = $conexion->query($consultaProductos);
  $datosProductos = $resultadoProductos->fetch_assoc();
  ?>

  <!-- Tarjetas resumen -->
  <div class="row text-center">
    <div class="col-md-4 mb-3">
      <div class="card card bg-white border p-3 text-black">
        <div class="card-body">
          <h5 class="card-title">Total de Ventas</h5>
          <p class="card-text fs-3"><?php echo $datosVentas['total_ventas'] ?? 0; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card card bg-white border p-3 text-black">
        <div class="card-body">
          <h5 class="card-title">Ingresos Totales</h5>
          <p class="card-text fs-3">$<?php echo number_format($datosVentas['ingresos_totales'] ?? 0, 0, ',', '.'); ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card card bg-white border p-3 text-black">
        <div class="card-body">
          <h5 class="card-title">Productos Vendidos</h5>
          <p class="card-text fs-3"><?php echo $datosProductos['productos_vendidos'] ?? 0; ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Filtro por rango de fechas -->
  <div class="mt-5 text-center">
    <h4 class="mb-4">Filtrar Pedidos por Fecha</h4>
    <form method="GET" class="row justify-content-center g-3">
      <div class="col-md-3">
        <label for="fecha_inicio" class="form-label">Desde:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $_GET['fecha_inicio'] ?? ''; ?>">
      </div>
      <div class="col-md-3">
        <label for="fecha_fin" class="form-label">Hasta:</label>
        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php echo $_GET['fecha_fin'] ?? ''; ?>">
      </div>
      <div class="col-md-2 align-self-end">
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </div>
    </form>
  </div>

  <!-- Tabla de pedidos detallados -->
  <div class="text-center fw-bold mb-3 mt-5">
    <h4 class="mb-3">Detalle de Pedidos</h4>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="table-dark text-center">
          <tr>
            <th>ID Pedido</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // Consulta detallada con filtro de fechas si aplica
        $fecha_inicio = $_GET['fecha_inicio'] ?? '';
        $fecha_fin = $_GET['fecha_fin'] ?? '';

        $consultaDetalles = "
          SELECT P.ID_Pedido, C.Nombre AS Cliente, P.Fecha_Pedido, P.Total, P.Estado
          FROM Pedido P
          INNER JOIN Cliente C ON P.ID_Cliente = C.ID_Cliente
        ";

        if (!empty($fecha_inicio) && !empty($fecha_fin)) {
          $consultaDetalles .= " WHERE P.Fecha_Pedido BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }

        $consultaDetalles .= " ORDER BY P.Fecha_Pedido DESC";
        $resultados = $conexion->query($consultaDetalles);

        if ($resultados->num_rows > 0) {
          while ($fila = $resultados->fetch_assoc()) {
            echo "<tr class='text-center'>";
            echo "<td>{$fila['ID_Pedido']}</td>";
            echo "<td>{$fila['Cliente']}</td>";
            echo "<td>{$fila['Fecha_Pedido']}</td>";
            echo "<td>$" . number_format($fila['Total'], 0, ',', '.') . "</td>";
            echo "<td>{$fila['Estado']}</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5' class='text-center'>No hay pedidos en este rango de fechas.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Botón volver -->
  <div class="text-center mt-5 mb-3">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">&larr; Volver</a>
  </div>
</div>

</body>
</html>
