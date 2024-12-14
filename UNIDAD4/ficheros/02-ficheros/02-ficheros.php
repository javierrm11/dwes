<?php
/**
 * Diseña e implementa una galería de fotos con las imágenes guardadas en un
 * directorio. La aplicación dispondrá de un instalador (install.php) que realizará las
 * siguientes tareas:
 * • Comprobar que el sistema tiene más de 10 Gigas de almacenamiento. Generará
 * un error en caso contrario y abortará la instalación.
 * • Solicitar las credenciales del administrador para almacenarlas en un fichero.
 * • Crear un directorio para almacenar las imágenes.
 * • Redireccionar al inicio de la aplicación cuando el proceso de instalación se haya
 * realizado correctamente.
 * • La aplicación borrará el instalador la primera vez que se ejecute.
 * La galería de fotos es pública y accesible por cualquier usuario del sistema.
 * El administrador podrá realizar las siguientes operaciones:
 * • Subida de imágenes.
 * • Borrado de imágenes.
 * • Copiado de imágenes.
 * • Renombrado de imágenes.
 * @author Javier Ruiz Molero
*/

define("MAXSIZE", 200000); // Tamaño máximo en bytes
define("DIRUPLOAD", 'imagenes/'); // Directorio para las subidas

$allowedFormat = array("image/png"); // Formatos MIME permitidos
$allowedExts = array("png"); // Extensiones permitidas

// Procesar la subida de la imagen
if (isset($_POST["anadir"])) {
    $temp = explode(".", $_FILES["image"]["name"]);
    $extension = strtolower(end($temp)); // Convertir la extensión a minúsculas

    if (($_FILES["image"]["size"] <= MAXSIZE) &&
        in_array($_FILES["image"]["type"], $allowedFormat) &&
        in_array($extension, $allowedExts)) {

        if ($_FILES["image"]["error"] > 0) {
            echo "Error en la subida: " . $_FILES["image"]["error"] . "<br/>";
        } else {
            $filename = uniqid() . '.' . $extension; // Nombre único para evitar conflictos
            if (file_exists(DIRUPLOAD . $filename)) {
                echo "El archivo ya existe.";
            } else {
                // Crear el directorio si no existe
                if (!is_dir(DIRUPLOAD)) {
                    mkdir(DIRUPLOAD, 0755, true);
                }

                // Mover el archivo subido
                if (move_uploaded_file($_FILES["image"]["tmp_name"], DIRUPLOAD . $filename)) {
                    echo "Archivo subido con éxito: $filename";
                } else {
                    echo "Error al mover el archivo.";
                }
            }
        }
    } else {
        echo "Archivo no permitido o supera el tamaño máximo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
</head>
<body>
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD4/ficheros/02-ficheros">Enlace a repositorio</a>
    <h1>Galería de imágenes</h1>
    <h3>Añadir imagen</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id=""><br/>
        <input type="submit" value="Añadir imagen" name="anadir">
    </form>

    <div>
        <?php
        include("./views/verImagenes.php");
        ?>
    </div>
</body>
</html>
