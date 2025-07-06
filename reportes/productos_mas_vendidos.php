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

  <style>
    /* === Estilos personalizados para la tabla === */
    .tabla-estilizada {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tabla-estilizada tbody tr:nth-child(odd) {
      background-color: #f8f9fa;
    }

    .tabla-estilizada tbody tr:hover {
      background-color: #e9ecef;
    }
  /* === Botón volver estilo link blanco === */
    .volver-link {
      background: none;
      border: none;
      color: #ffffff;
      padding: 0;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.3s;
    }
    .volver-link:hover {
      color: #cccccc;
      text-decoration: none;
    }
    
  </style>
</head>
<body class="bg-light">

<div class="container-fluid">
  <div class="row align-items-center">
    <div class="col-md-12 text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
      <h2 class="m-0">Productos Más Vendidos</h2>
      <!--boton volver-->
       <nav>
        <ul class="nav">
          <li class="nav-item">
          <a href="../paneles/paneladmin.php" class="btn btn-secondary shadow volver-link">
              <i class="bi bi-box-arrow-right"></i> volver
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

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
 <div class="container mb-5">
  <!-- Tabla de productos más vendidos -->
  <div class="table-responsive tabla-estilizada"><!-- APLICADO ESTILO -->
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
</div>
        <!-- FOOTER (Agregado) -->
<footer class="bg-dark text-white text-center text-md-start py-5">
  <div class="container">
    <div class="row"><!-- Ocupa las 12 columnas -->
      <div class="col-md-3 mb-3">
        <h5>K-SHOP</h5>
        <p>Tu tienda de moda en línea con lo mejor en estilo, comodidad y precio. ¡Gracias por elegirnos!</p>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Enlaces rápidos</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Inicio</a></li>
          <li><a href="#" class="text-white">Productos</a></li>
          <li><a href="#" class="text-white">Servicios</a></li>
          <li><a href="#" class="text-white">Contáctanos</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Legal</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Términos y condiciones</a></li>
          <li><a href="#" class="text-white">Política de privacidad</a></li>
          <li><a href="#" class="text-white">Cookies</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-3">
        <h5>Contáctanos</h5>
        <p><i class="bi bi-envelope"></i> contacto@kshop.com</p>
        <p><i class="bi bi-telephone"></i> +57 301 000 0000</p>
        <p><i class="bi bi-geo-alt"></i> Bogotá, Colombia</p>
      </div>
    </div>
    <hr class="border-light">
    <p class="mb-0 text-center">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>
</body>
</html>
