<?php
/**
 * Crear una pequeña aplicación para gestionar una agenda de contactos.
 * @author javier Ruiz Molero
*/
// variables
$nombre = $tlf = "";
$errorNombre = $errorTlf = "";
$error = false;
// Iniciar sesion
session_start();

if(!isset($_SESSION["contactos"])){
    $_SESSION["contactos"] = [];
}

//añadir contactos
if(isset($_POST["enviar"])){
    $nombre = $_POST["nombre"];
    $tlf = $_POST["tlf"];

    if($nombre == ""){
        $errorNombre = "Debes de introducir un nombre";
        $error = true;
    }
    if($tlf == ""){
        $errorTlf = "Debes de introducir un telefono";
        $error = true;
    }
}
if(!$error){
    $_SESSION["contactos"][] = [$nombre,$tlf];
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
    <a href="">Enlace a repositorio</a>
    <h1>Agenda contactos</h1>
    <a href="cerrarsesion.php">Cerrar sesion</a>
    <form action="" method="post">
        <label for="nombre">Nombre</label><br/>
        <input type="text" name="nombre" id="" value="<?php echo $nombre ?>"><?php echo $errorNombre ?><br/>

        <label for="tlf">Tlf</label><br/>
        <input type="tel" name="tlf" id="" value="<?php echo $tlf ?>"><?php echo $errorTlf ?><br/>

        <input type="submit" value="Añadir contacto" name="enviar">
    </form>
    <h2>Contactos</h2>
    <ul>
    <?php
        foreach ($_SESSION["contactos"] as $contacto) {
            echo "<li>$contacto[0]: $contacto[1]</li>";
        }
    ?>
    </ul>
</body>
</html>