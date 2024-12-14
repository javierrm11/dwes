<?php

// Test para comprobar el manejo del fichero de texto

include "../configuracion/config.php";

$desglose = [];
$usuarios = [];

// Abrir fichero
$file = fopen("../RegMisAlu.csv","r");
$alumno = "";

// despreciamos cabecera
for ($i=0; $i < LINE_CABECERA; $i++) { 
    fgets($file);
}
// recorremos hasta final de fichero
while(!feof($file)){
    $valores = 0;
    // Poner en minuscula
    $alumno = fgets($file);
    
    // Quita tildes 
    $alumnoSt = str_replace($caractreresBusqueda, $caractreresRemplaza, $alumno);
    
    // Poner minuscula
    $alumnoMin = mb_strtolower($alumnoSt);

    $desglose = explode(" ", $alumnoMin);

    // Nombre usuario
    $nombreUsuario = substr($desglose[0],0,2) . substr($desglose[1],0,2) . substr($desglose[2] ?? "",0,2);

    $auxUsuario = $nombreUsuario;
    while(in_array($auxUsuario, $usuarios)){
        $valores++;
        $auxUsuario = $nombreUsuario . $valores;
    }
    array_push($usuarios, $auxUsuario);
    echo $auxUsuario . "<br/>";
}

fclose($file);
