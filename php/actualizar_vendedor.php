<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? null;
    $estado = $_POST['estado'] ?? null;

    if ($id && $estado) {
        $sql = "UPDATE Empleado SET Estado = ? WHERE ID_Empleado = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $estado, $id);

        if ($stmt->execute()) {
            echo "Estado actualizado correctamente. <a href='consultar_vendedores.php'>Volver</a>";
        } else {
            echo "Error al actualizar: " . $stmt->error;
        }
    } else {
        echo "Faltan datos.";
    }
} else {
    echo "Acceso no permitido.";
}
