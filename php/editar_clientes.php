<?php
include '../conexion/conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Cliente WHERE ID_Cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();
?>

<h2>Editar Cliente</h2>
<form action="actualizar_cliente.php" method="POST">
  <input type="hidden" name="id" value="<?= $cliente['ID_Cliente'] ?>">
  <label>Nombre:</label>
  <input type="text" name="nombre" value="<?= $cliente['Nombre'] ?>"><br>
  <label>Correo:</label>
  <input type="email" name="correo" value="<?= $cliente['Correo'] ?>"><br>
  <button type="submit">Actualizar</button>
</form>
