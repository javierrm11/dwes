<?php
/**
 * Hacer un programa que guarde el nombre y los apellidos de un usuario en variables de sesión y muestre un enlace a otra página.
 * @author Javier Ruiz Molero
 */
session_start();

if (!isset($_SESSION["nombre"])) {
    $_SESSION["nombre"] = "javier";
    $_SESSION["apellidos"] = "ruiz";
}
?>
<a href="https://github.com/javierrm11/dwes/blob/main/UNIDAD4/sessiones/ejer_clase/01-sesiones.php">Enlace a repositorio</a>