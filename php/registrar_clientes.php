<?php
session_start();
include '../conexion/conexion.php';

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: ../Barra de navegacion/Iniciarsesion.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre     = $_POST["nombre"];
    $apellido   = $_POST["apellido"];
    $telefono   = $_POST["telefono"];
    $documento  = $_POST["documento"];
    $correo     = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $fecha      = date("Y-m-d");

    // Verificar si el correo ya está registrado
    $stmt = $conexion->prepare("SELECT ID_Cliente FROM Cliente WHERE Correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='./listar_clientes.php';</script>";
    } else {
        // Insertar cliente
        $stmt = $conexion->prepare("INSERT INTO Cliente (Nombre, Apellido, Telefono, Documento, Correo, Contrasena, Fecha_Registro) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $documento, $correo, $contrasena, $fecha);

        if ($stmt->execute()) {
            echo "<script>alert('Cliente registrado exitosamente.'); window.location.href='../Paneles/paneladmin.php';</script>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
    }

    $stmt->close();
    $conexion->close();
}
?>

