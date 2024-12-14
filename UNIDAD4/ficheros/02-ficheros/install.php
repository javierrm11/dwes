<?php
/**
 *  Comprobar que el sistema tiene más de 10 Gigas de almacenamiento. Generará
 * un error en caso contrario y abortará la instalación.
 * • Solicitar las credenciales del administrador para almacenarlas en un fichero.
 * • Crear un directorio para almacenar las imágenes.
 * • Redireccionar al inicio de la aplicación cuando el proceso de instalación se haya
 * realizado correctamente.
*/
require "./config/config.php";

// variables
$nombreUsuario = $contrasena = "";
$errorUs = $errorCon = $errorCrede = "";
$acreditado = false;

// Obtener espacio en disco disponible en bytes
$espacioDisponible = disk_free_space("/"); // "/" se refiere al directorio raíz del sistema

// Convertir bytes a gigabytes
$espacioDisponibleGB = $espacioDisponible / (1024 ** 3);

// Comprobar si hay al menos 10 GB disponibles
if ($espacioDisponibleGB < 10) {
    // Generar error y abortar la instalación
    die("Error: El sistema no tiene suficiente espacio en disco. 
         Se requiere al menos 10 GB de almacenamiento disponible. 
         Espacio actual: " . number_format($espacioDisponibleGB, 2) . " GB.");
}

if(isset($_POST["login"])){
    $nombreUsuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    if($nombreUsuario == ""){
        $errorUs = "El nombre es obligatorio";
    }
    if($contrasena == ""){
        $errorUs = "La contraseña es obligatoria";
    }

    foreach ($usuarios as $usuario) {
        if($nombreUsuario == $usuario[0] && $contrasena == $usuario[1]){
            $acreditado = true;
        } else{
            $errorCrede = "El usuario y la contraseña no son correctos";
        }
    }
}

if($acreditado){
    $directorio = './imagenes';

    // Comprobar si el directorio ya existe
    if (!is_dir($directorio)) {
        // Intentar crear el directorio con permisos adecuados
        mkdir($directorio, 0755);
        
    }
    header("location: ./02-ficheros.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Nombre de usuario</label><br/>
        <input type="text" name="usuario" id=""><?php echo $errorUs ?><br/>

        <label for="contrasena">Contraseña</label><br/>
        <input type="text" name="contrasena" id=""><?php echo $errorCon ?><br/>

        <input type="submit" value="Login" name="login"><br/>
        <?php echo $errorCrede ?>
    </form>
</body>
</html>