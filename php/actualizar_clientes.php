<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $correo = $_POST['correo'] ?? null;
    $estado = $_POST['estado'] ?? null;

    if ($id && $nombre && $correo && $estado) {
        $sql = "UPDATE Cliente SET Nombre = ?, Correo = ?, Estado = ? WHERE ID_Cliente = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $correo, $estado, $id);

        if ($stmt->execute()) {
            echo "Cliente actualizado correctamente. <a href='../php/consultar_clientes.php'>Volver</a>";
        } else {
            echo "Error al actualizar: " . $stmt->error;
        }
    } else {
        echo "Faltan datos del formulario.";
    }
} else {
    echo "Acceso inválido.";
}
?>
