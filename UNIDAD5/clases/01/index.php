<?php

// Requerimos clase persona
require_once "01-clase.php";

// Creamos una persona
$persona = new Persona("Javier", "Ruiz", "Molero");

$persona->saludo();
echo $persona->nombre();
?>
<a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD5/clases/01">Enlace a repositorio</a>