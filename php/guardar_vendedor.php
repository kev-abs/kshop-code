<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT); // Cifrado seguro
  $cargo = "vendedor";

  // Validar si el correo ya existe
  $verificar = $conexion->prepare("SELECT ID_Empleado FROM Empleado WHERE Correo = ?");
  $verificar->bind_param("s", $correo);
  $verificar->execute();
  $verificar->store_result();

  if ($verificar->num_rows > 0) {
    echo "El correo ya está registrado. <a href='../Barra de navegacion/registrar_vendedor.php'>Volver</a>";
  } else {
    // Insertar nuevo vendedor con contraseña cifrada
    $sql = "INSERT INTO Empleado (Nombre, Correo, Contrasena, Cargo) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $contrasena, $cargo);

    if ($stmt->execute()) {
      echo "Vendedor registrado correctamente. <a href='../Paneles/paneladmin.php'>Volver al Panel</a>";
    } else {
      echo "Error: " . $stmt->error;
    }
  }

  $verificar->close();
  $conexion->close();
}
?>

