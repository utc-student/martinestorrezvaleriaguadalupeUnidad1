<?php
// Iniciar sesión si aún no se ha iniciado
session_start();

// Destruir la sesión actual para cerrarla
session_destroy();

// Limpiar todas las variables de sesión
$_SESSION = array();

// Redirigir a la página de inicio u otra página después del logout
header("Location: index.php"); // Cambia "index.php" por la página a la que quieres redirigir después del logout
exit();
?>