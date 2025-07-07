<?php
session_start();
session_unset();
session_destroy();

// Evita que el navegador guarde la caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Location: ../Barra de navegacion/Iniciarsesion.php");
exit();
?>
