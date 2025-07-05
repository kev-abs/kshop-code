<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo_ingresado = $_POST['codigo'] ?? '';
    $codigo_guardado = $_SESSION['codigo_verificacion'] ?? '';

    if ($codigo_ingresado == $codigo_guardado) {
        echo "correcto";
    } else {
        echo "incorrecto";
    }
} else {
    echo "Acceso denegado.";
}
?>
