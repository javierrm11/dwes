<?php

function cargarTareas() {
    if (empty($_SESSION["tareas"])) {
        $_SESSION["tareas"] = [];
        $file = fopen("../tareas/". $_SESSION["usuario"][0] .".txt", 'r');
        while (!feof($file)) {
            $tarea = fgets($file);
            if ($tarea) { // Asegurarse de que no agregue líneas vacías
                $_SESSION["tareas"][] = [
                    "tarea" => trim($tarea), // Eliminar posibles saltos de línea
                    "completada" => false
                ];
            }
        }
        fclose($file);
    }
}

// Función para guardar las tareas en un archivo
function guardarTareas() {
    $file = fopen("../tareas/" . $_SESSION["usuario"][0] . ".txt", 'w');
    foreach ($_SESSION["tareas"] as $tarea) {
        fwrite($file, $tarea["tarea"] . "\n");
    }
    fclose($file);
}