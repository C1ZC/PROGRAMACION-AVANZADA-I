<?php
session_start(); // inicia la sesión

// asigna valores a las variables de sesión
$_SESSION['nombre'] = "Juan";
$_SESSION['apellido'] = "Pérez";
$_SESSION['rut'] = "12345678-9";

echo "Variables de sesión registradas";
?>
