<?php
session_start();
include("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = trim($_POST["correo"]);
    $contrasena = $_POST["contrasena"];

    // Buscar en tabla Cliente
    $sql_cliente = "SELECT ID_Cliente, Nombre, Contrasena FROM Cliente WHERE Correo = ?";
    $stmt = $conexion->prepare($sql_cliente);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $cliente = $resultado->fetch_assoc();
        if (password_verify($contrasena, $cliente["Contrasena"])) {
            $_SESSION["id_cliente"] = $cliente["ID_Cliente"];
            $_SESSION["nombre"] = $cliente["Nombre"];
            $_SESSION["rol"] = "cliente";
            header("Location: ../Paneles/panelcliente.php");
            exit();
        }
    }

    // Buscar en tabla Empleado
    $sql_empleado = "SELECT ID_Empleado, Nombre, Cargo, Contrasena FROM Empleado WHERE Correo = ?";
    $stmt = $conexion->prepare($sql_empleado);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $empleado = $resultado->fetch_assoc();
        if (($contrasena===$empleado["Contrasena"])) {
            $_SESSION["id_empleado"] = $empleado["ID_Empleado"];
            $_SESSION["nombre"] = $empleado["Nombre"];
            $_SESSION["cargo"] = $empleado["cargo"];
            
            // Verificar rol según el cargo
            $cargo = strtolower(trim($empleado["Cargo"]));  
            if ($cargo === "administrador") {
                $_SESSION["rol"] = "administrador";
                header("Location: ../Paneles/paneladmin.php");
                exit();
            } elseif ($cargo === "vendedor") {
                $_SESSION["rol"] = "vendedor";
                header("Location: ../Paneles/panelvendedor.php");
                exit();
            }
            else {
                echo "<script>alert('Rol no reconocido.'); window.history.back();</script>";
            }
        }
    }

    // Si ningún login fue exitoso
    echo "<script>alert('Correo o contraseña incorrectos.'); window.history.back();</script>";
}
?>
