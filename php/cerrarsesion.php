<?php
session_start();
session_unset();    // Limpia todas las variables de sesión
session_destroy();  // Destruye la sesión

// Evita que el navegador guarde la página anterior en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirige al login
header("Location: ../Barra de navegacion/Iniciarsesion.php");
exit();
?>