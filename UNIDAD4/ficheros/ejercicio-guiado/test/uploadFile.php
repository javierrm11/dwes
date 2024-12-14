<?php

define("DIRUPLOAD","upload/");
define("MAXSIZE",200000);

if (isset($_POST['submit'])) {
    // Verifica si se ha subido un archivo
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];

        // Verificar el tipo MIME para asegurarse de que sea un CSV
        $fileType = mime_content_type($file['tmp_name']);
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        if ($fileType === 'text/csv' || $fileExtension === 'csv') {
            // Si es CSV, procesar el archivo (aquí puedes hacer lo que necesites con él)
            header("location: ./test/test02.php");
        } else {
            echo "Error: El archivo no es un archivo CSV válido.";
        }
    } else {
        echo "Error: No se ha subido ningún archivo o hubo un problema con la subida.";
    }
} else {
    echo "Formulario no enviado correctamente.";
}



