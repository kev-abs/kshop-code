<?php
include '../conexion/conexion.php';

$sql = "SELECT * FROM Cliente";
$resultado = $conexion->query($sql);
?>

<h2>Lista de Clientes</h2>
<table border="1">
  <tr>
    <th>ID</th><th>Nombre</th><th>Correo</th><th>Fecha Registro</th><th>Acciones</th>
  </tr>
  <?php while ($row = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $row['ID_Cliente'] ?></td>
      <td><?= $row['Nombre'] ?></td>
      <td><?= $row['Correo'] ?></td>
      <td><?= $row['Fecha_Registro'] ?></td>
      <td>
        <a href="editar_cliente.php?id=<?= $row['ID_Cliente'] ?>">Editar</a> |
        <a href="eliminar_cliente.php?id=<?= $row['ID_Cliente'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
