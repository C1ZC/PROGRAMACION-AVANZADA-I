<?php
session_start(); // inicia la sesión

// imprime los valores de las variables de sesión
echo "Nombre: " . $_SESSION['nombre'] . "<br>";
echo "Apellido: " . $_SESSION['apellido'] . "<br>";
echo "RUT: " . $_SESSION['rut'] . "<br>";
?>