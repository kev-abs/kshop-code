<?php
include '../conexion/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$sql = "UPDATE Cliente SET Nombre = ?, Correo = ? WHERE ID_Cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssi", $nombre, $correo, $id);

if ($stmt->execute()) {
  echo "Cliente actualizado correctamente. <a href='listar_clientes.php'>Volver</a>";
} else {
  echo "Error al actualizar: " . $stmt->error;
}
?>
