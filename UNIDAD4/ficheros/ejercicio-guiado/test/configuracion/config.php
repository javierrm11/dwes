<?php

define("LINE_CABECERA" , 1);

// Año inicio y final del campo form de años de cursos.
define("A_INCIO" , 2010);
define("A_FINAL" , 2030);   

// Reemplazar caracteres especiales y tildes.
$caractreresBusqueda = ["Á", "á", "É", "é", "Í", "í", "Ó", "ó","Ú","ú", "Ñ", "ñ", ",", "\""];
$caractreresRemplaza = ["A", "a", "E", "e", "I", "i", "O", "o", "U", "u", "N", "n", "", ""];

// Arrays para los campos del formulario
$grupos = [
    "20/21",
    "21/22",
    "22/23",
    "23/24",
    "24/25"
];
$cursos = ["2 DAW", "1 DAW", " 2 ASIR", "1 ASIR"];
$sistemas = ["Linux", "MySql"];

