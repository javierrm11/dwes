<?php
/**
 * Enunciado:
 * Sumar los 3 primeros números pares
 * @author Javier Ruiz Molero 
 **/

// Declarar variables
$suma = 0;
$contador = 0;
$numero = 2;

// Bucle while para iterar
while ($contador <3){
    $suma += $numero; // añadir el valor de numero a suma
    $numero += 2;
    $contador++; // sumar el contador 1
}
echo "La suma es: $suma";
?>
<a href="https://github.com/javierrm11/dwes/blob/main/UNIDAD3/bucles/02-bucles.php">Enlace al repositorio</a>