<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $fecha = date("Y-m-d");

    // Verificar si el correo ya está registrado
    $sql_verificar = "SELECT ID_Cliente FROM Cliente WHERE Correo = ?";
    $stmt = $conexion->prepare($sql_verificar);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El correo ya está registrado.";
    } else {
        // Insertar nuevo cliente
        $sql = "INSERT INTO Cliente (Nombre, Correo, Contrasena, Fecha_Registro) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $correo, $contrasena, $fecha);

        if ($stmt->execute()) {
            echo "Registro exitoso. <a href='../Barra de navegacion/Iniciarsesion.php'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
    }

    $stmt->close();
    $conexion->close();
}
?>
