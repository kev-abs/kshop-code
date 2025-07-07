<?php
session_start();
include '../conexion/conexion.php';

// Verificar si el usuario está autenticado como cliente
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

// Obtener el ID del cliente desde la sesión
$id_cliente = $_SESSION["id_cliente"] ?? null;

// Si no se tiene el ID, redirigir
if (!$id_cliente) {
    echo "Error: sesión no válida.";
    exit();
}

// Obtener los datos actuales del cliente
$sql = "SELECT * FROM Cliente WHERE ID_Cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    echo "Cliente no encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Perfil - K-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Estilos/stilos.css">
</head>
<body>

<!-- Encabezado -->
<div class="header d-flex justify-content-between align-items-center p-3" style="background-color: #198754; color: white;">
  <div class="logo fw-bold fs-3">K-SHOP</div>
  <nav>
    <ul class="nav">
      <li class="nav-item">
        <a href="../Paneles/panelcliente.php" class="nav-link text-dark">Panel</a>
      </li>
      <li class="nav-item">
        <a href="../php/cerrarsesion.php" class="btn ">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Formulario -->
<div class="container mt-5">
  <h2 class="text-center mb-4">✏️ Editar Mi Perfil</h2>
  <form action="editar_perfil_cliente.php" method="POST" class="card p-4 shadow">
    <input type="hidden" name="id" value="<?= $cliente['ID_Cliente'] ?>">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($cliente['Nombre']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" class="form-control" name="correo" value="<?= htmlspecialchars($cliente['Correo']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono:</label>
      <input type="text" class="form-control" name="telefono" value="<?= htmlspecialchars($cliente['Telefono']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="documento" class="form-label">Documento:</label>
      <input type="text" class="form-control" name="documento" value="<?= htmlspecialchars($cliente['Documento']) ?>" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="perfil_cliente.php" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </div>
  </form>
</div>

<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
