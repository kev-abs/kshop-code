<?php
//  Validar sesión como administrador
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}
?>

<?php
// Conexión a la base de datos
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Clientes Frecuentes - KSHOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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

    <!-- Título -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 bg-ligth text-white text-center p-3 mb-4" style="background-color:	rgb(0, 0, 0);">
        <h2 class="m-0">Clientes Frecuentes</h2>
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

  <div class="container">
    <!-- Consulta SQL para obtener clientes frecuentes -->
    <?php
    $consulta = "
        SELECT c.Nombre, COUNT(p.ID_Pedido) AS TotalCompras, SUM(p.Total) AS ValorTotal
        FROM Cliente c
        JOIN Pedido p ON c.ID_Cliente = p.ID_Cliente
        GROUP BY c.ID_Cliente
        ORDER BY TotalCompras DESC, ValorTotal DESC
        LIMIT 10;
    ";
    $resultado = $conexion->query($consulta);
    ?>
    <!-- 🔍 Buscador en tiempo real por nombre -->
    <div class="mb-3">
      <input type="text" id="buscadorCliente" class="form-control" placeholder="Buscar cliente...">
    </div>

    <!-- Tabla de clientes frecuentes -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th>Nombre del Cliente</th>
            <th>Total de Compras</th>
            <th>Valor Total Comprado</th>
          </tr>
        </thead>
      </table>
  </div>
  </div> <!--cierre del container-->

  <!-- FOOTER -->
<footer class="bg-dark text-white text-center text-md-start py-5">
    <div class="container-fluid">
      <div class="row px-4">
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
<script>
  //  Script para buscar clientes en tiempo real
  document.getElementById('buscadorCliente').addEventListener('keyup', function () {
    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll("table tbody tr");

    filas.forEach(function (fila) {
      let texto = fila.textContent.toLowerCase();
      fila.style.display = texto.includes(filtro) ? '' : 'none';
    });
  });
</script>

</body>
</html>
