<?php
// Validar sesión como administrador
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
  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
<body class="bg-light d-flex flex-column min-vh-100">

 <div class="container-fluid">
  <div class="row">
    <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
       <div class="d-flex justify-content-between align-items-center">
        <!-- LOGO a la izquierda -->
        <div class="d-flex align-items-center">
          <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="60" class="me-2">
          <a href="./index.php" class="text-decoration-none fs-6 fw-bold text-white">K-SHOP</a>
        </div>
        <!-- TÍTULO centrado -->
      <h2 class="m-0 text-center felx-grow-1">Estadistica de ventas</h2>
      <!-- Botón volver alineado a la izquierda con estilo mejorado -->
          <nav style="background-color: rgb(0, 0, 0);" class="px-3 py-2">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a href="../paneles/paneladmin.php"
                  style="color: white; font-weight: 600; font-size: 1rem; text-decoration: none;"
                  onmouseover="this.style.color='#FFD700'"
                  onmouseout="this.style.color='white'">
                  <i class="bi bi-arrow-left-circle-fill me-1"></i> volver
                </a>
              </li>
            </ul>
          </nav>
    </div>
  </div>
</div>

  <div class="container">
    <div class="row justify-content-between">
      <!-- Columna izquierda con tarjetas una debajo de otra -->
      <div class="col-md-4 d-flex flex-column gap-3">
        <?php
        // Consultas de resumen
        $consultaVentas = "SELECT COUNT(*) AS total_ventas, SUM(Total) AS ingresos_totales FROM Pedido";
        $resultadoVentas = $conexion->query($consultaVentas);
        $datosVentas = $resultadoVentas->fetch_assoc();

        $consultaProductos = "SELECT SUM(Cantidad) AS productos_vendidos FROM Detalle_Pedido";
        $resultadoProductos = $conexion->query($consultaProductos);
        $datosProductos = $resultadoProductos->fetch_assoc();
        ?>

        <!-- Tarjeta: Total de Ventas -->
        <div class="card border-warning">
          <div class="card-body">
            <h5 class="card-title">Total de Ventas</h5>
            <p class="fs-3 mb-0"><?php echo $datosVentas['total_ventas'] ?? 0; ?></p>
          </div>
        </div>

        <!-- Tarjeta: Ingresos Totales -->
        <div class="card border-warning">
          <div class="card-body">
            <h5 class="card-title">Ingresos Totales</h5>
            <p class="fs-3 mb-0">
              $<?php echo number_format($datosVentas['ingresos_totales'] ?? 0, 0, ',', '.'); ?>
            </p>
          </div>
        </div>

        <!-- Tarjeta: Productos Vendidos -->
        <div class="card border-warning">
          <div class="card-body">
            <h5 class="card-title">Productos Vendidos</h5>
            <p class="fs-3 mb-0"><?php echo $datosProductos['productos_vendidos'] ?? 0; ?></p>
          </div>
        </div>
      </div>

      <!-- filtro y tabla -->
      <div class="col-md-7">
        <!-- Filtro de fecha -->
        <div class="card mb-4">
          <div class="card-body">
            <h4 class="mb-3">Filtrar Pedidos por Fecha</h4>
            <form method="GET" class="row g-3">
              <div class="col-md-5">
                <label for="fecha_inicio" class="form-label">Desde:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $_GET['fecha_inicio'] ?? ''; ?>">
              </div>
              <div class="col-md-5">
                <label for="fecha_fin" class="form-label">Hasta:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php echo $_GET['fecha_fin'] ?? ''; ?>">
              </div>
              <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-secondary w-100">Filtrar</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Tabla de detalle de pedidos -->
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">Detalle de Pedidos</h4>
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead class="table-dark">
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
                // Consulta con filtro si hay fechas
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
                    echo "<tr>";
                    echo "<td>{$fila['ID_Pedido']}</td>";
                    echo "<td>{$fila['Cliente']}</td>";
                    echo "<td>{$fila['Fecha_Pedido']}</td>";
                    echo "<td>$" . number_format($fila['Total'], 0, ',', '.') . "</td>";
                    echo "<td>{$fila['Estado']}</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='5'>No hay pedidos en este rango de fechas.</td></tr>";
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div> <!-- cierre del .container -->
 </div>   

   <!-- FOOTER -->
    <footer class="bg-dark text-white text-center text-md-start py-5 mt-auto">
      <div class="container">
        <div class="row">
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
