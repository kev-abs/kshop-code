<?php
$conexion = new mysqli("localhost", "root", "", "tiendakshop");

$busqueda = isset($_GET["q"]) ? $conexion->real_escape_string($_GET["q"]) : "";

$sql = "SELECT * FROM producto 
        WHERE (Nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%') 
        AND Estado = 'activo'";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Resultados de búsqueda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h1>Resultados para "<?= htmlspecialchars($busqueda) ?>"</h1>

  <div class="row">
    <?php if ($resultado->num_rows > 0): ?>
      <?php while ($row = $resultado->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="../Imagenes/<?= htmlspecialchars($row["Imagen"]) ?>" class="card-img-top" alt="<?= htmlspecialchars($row["Nombre"]) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row["Nombre"]) ?></h5>
              <p class="card-text"><?= htmlspecialchars($row["Descripcion"]) ?></p>
              <p class="card-text"><strong>$<?= number_format($row["Precio"], 0, ',', '.') ?></strong></p>
              <a href="producto1.php" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No se encontraron productos que coincidan con tu búsqueda.</p>
    <?php endif; ?>
  </div>
</body>
</html>
