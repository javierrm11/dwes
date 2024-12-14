<?php
// Imprimir imagenes

$directory = DIRUPLOAD; // Directorio donde se encuentran las imágenes

// Verificar si el directorio existe
if (is_dir($directory)) {
    // Obtener una lista de archivos
    $files = scandir($directory);
    
    // Filtrar y mostrar solo imágenes
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && is_file($directory . $file)) {
            // Mostrar cada imagen como una miniatura
            echo "<div style='display: inline-block; margin: 10px; text-align: center;'>";
            echo "<img src='$directory$file' alt='$file' style='width: 150px; height: auto;'><br/>";
            echo "<span>$file</span>";
            echo "</div>";
        }
    }
} else {
    echo "El directorio de imágenes no existe.";
}
?>
