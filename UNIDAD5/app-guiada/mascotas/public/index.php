<?php
/**
 * Haz un programa que cree un objeto de la clase Perro y otro de la clase Persona.
 * @author Javier Ruiz Molero
 */
require_once "../vendor/autoload.php";


use App\Models\Perro;
use App\Models\Persona;


$perro = new Perro('tana', 'negro');
echo "Dame la pata";
$perro->darPata();
$perro->darPata();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->darPata();
$perro->darPata();
?>
<a href="">Enlace a repositorio</a>