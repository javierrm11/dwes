<?php
session_start();

// definir directorio
define("DIR_USER","/home/2º24-25/");

$alumnos = $_SESSION["alumnos"];

foreach ($alumnos as $alumno) {
    echo $alumno;
}
