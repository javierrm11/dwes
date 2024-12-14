<?php

use App\Models\Perro;

require_once "../app/Models/Mascotas.php";
require_once "../app/Models/DBAbstractModel.php";
require_once "../app/Config/config.php";

// Creamos mascotas sin patron de diseño
$mascota1 = new Mascotas();
$mascota2 = new Mascotas();

//Creamos mascotas con patron de diseño
$mascota3 = Mascotas::getInstancia();
$mascota4 = Mascotas::getInstancia();


$mascota = Mascotas::getInstancia();
$mascota->setNombre("Dakota");
$mascota->setPeso(30);
$mascota->setRaza("caniche");
$perros = $mascota->get(45);
foreach ($perros as $perro => $value) {
    echo $perro . ": " . $value . "<br>";
}
?>
<a href="">Enlace a repositorio</a>