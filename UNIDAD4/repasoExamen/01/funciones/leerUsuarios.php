<?php
include("./config/config.php");

//
$usuarios = [];
//Abrir fichero
$file = fopen("./usuarios.txt", 'r');

// recorrer usuarios
while (!feof($file)) {
    //Cargamos la linea del fichero
    $usuario = fgets($file);
    //separemos por el :
    $alumno= explode(":", $usuario);
    // lo añadimos al array
    $usuarios[] = $alumno;
}