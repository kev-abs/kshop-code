<?php
//  Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<?php
//  Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos más vendidos - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <!-- Título de la página -->
  <h2 class="mb-4 text-center">🔥 Productos Más Vendidos</h2>

  <?php
  // Consulta SQL para obtener productos más vendidos
  $consulta = "
    SELECT P.Nombre, SUM(D.Cantidad) AS Total_Vendido
    FROM Detalle_Pedido D
    INNER JOIN Producto P ON D.ID_Producto = P.ID_Producto
    GROUP BY P.ID_Producto, P.Nombre
    ORDER BY Total_Vendido DESC
    LIMIT 10
  ";
  $resultados = $conexion->query($consulta);
  ?>

  <!-- Tabla de productos más vendidos -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>Nombre del Producto</th>
          <th>Unidades Vendidas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // INICIO - Mostrar resultados en la tabla
        if ($resultados && $resultados->num_rows > 0) {
          while ($fila = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$fila['Nombre']}</td>";
            echo "<td>{$fila['Total_Vendido']}</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No hay datos de ventas registradas.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Botón volver al panel -->
  <div class="text-center mt-4">
    <a href="../paneles/paneladmin.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>

</div>

</body>
</html>
