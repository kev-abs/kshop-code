<?php
session_start();
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nueva = $_POST['nueva'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';
    $correo = $_SESSION['correo_recuperacion'] ?? null;

    if (!$correo) {
        echo "Sesión expirada. Intenta desde el inicio.";
        exit();
    }

    if ($nueva !== $confirmar) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Encriptar contraseña
    $hash = password_hash($nueva, PASSWORD_DEFAULT);

    $sql = "UPDATE Cliente SET Contrasena = ? WHERE Correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $hash, $correo);

    if ($stmt->execute()) {
        unset($_SESSION['codigo_verificacion']);
        unset($_SESSION['correo_recuperacion']);
        echo "actualizada";
    } else {
        echo "Error al actualizar la contraseña.";
    }
} else {
    echo "Acceso denegado.";
}
?>
