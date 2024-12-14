<?php

/**
 * Probar clase contador
 * @author Javier Ruiz Molero
 */

require_once "Contador.php";

$nInstancias = Contador::nInstancias();

echo $nInstancias;

$c1 = new Contador();
$c2 = new Contador(100);
$c3 = new Contador();

echo $c1, $c2;

echo $c1->contar();
echo $c2->contar();
echo $c1->contar();

$nInstancias = Contador::nInstancias();
echo $nInstancias;

?>
<a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD5/clases/02">Enlace a repositorio</a>