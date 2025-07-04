<?php
session_start();
include '../conexion/conexion.php';

require '../src/PHPMailer.php';
require '../src/SMTP.php';
require '../src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'] ?? '';

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM Cliente WHERE Correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $codigo = rand(100000, 999999);
            $_SESSION['codigo_verificacion'] = $codigo;
            $_SESSION['correo_recuperacion'] = $correo;

            $mail = new PHPMailer(true);

            try {
                // Configurar servidor SMTP (Gmail)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tucorreo@gmail.com'; // Tu correo
                $mail->Password = 'tu_clave_app';       // Tu contraseña o clave de aplicación
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Remitente y destinatario
                $mail->setFrom('tucorreo@gmail.com', 'K-SHOP');
                $mail->addAddress($correo);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Código de verificación - K-SHOP';
                $mail->Body = "<p>Tu código de verificación es: <strong>$codigo</strong></p>";

                $mail->send();
                echo "Codigo enviado";
            } catch (Exception $e) {
                echo "Error al enviar correo: " . $mail->ErrorInfo;
            }
        } else {
            echo "Correo no registrado.";
        }
    } else {
        echo "Correo inválido.";
    }
} else {
    echo "Acceso denegado.";
}
