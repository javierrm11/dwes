<?php
/**
 * Agenda de contactos con uso de sessiones
 * @author Javier Ruiz Molero
 */

// iniciamos session
session_start();

$lProcesa = true;


// si no existe, lo creamos como vacio
if(!isset($_SESSION["contactos"])) {
    $_SESSION["contactos"] = array();
}

// Si hemos enviado el formulario
if(isset($_POST["enviar"])){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $tlf = $_POST["tlf"];

        // Compruebo que no haya ningun campo vacio
        if ($nombre == ""){
            $lProcesa = false;
            $errorNombre = "Nombre requerido";
        }

        if($email == ""){
            $lProcesa = false;
            $errorEmail = "Email requerido";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $lProcesa = false;
            $errorEmail = "Email no Valido";
        }

        if($tlf == ""){
            $lProcesa = false;
            $errorTlfon = "Telefono requerido";
        }
}
if(!$lProcesa) {
    header("location: 02-session.php");
} else {
    // Añadir al array con array_push
    $_SESSION["contactos"][] = array(
        "nombre" => $nombre,
        "email" => $email,
        "tlf" => $tlf
    );
}

$data = $_SESSION["contactos"];
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
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD4/sessiones/ejer_clase/02">Enlace a repositorio</a>
    <h1>Agenda</h1>
    <a href="./cerrarsesion.php">Cerrar Session</a> <br/>
    <h2>Nuevo Contacto</h2>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="tlf">Telefono</label>
        <input type="text" name="tlf" id="tlf">

        <input type="submit" value="Enviar" name="enviar">
    </form>
    <h2>Lista de Contactos</h2>
    <?php
    foreach($data as $contacto => $valor) {
        echo $valor["nombre"] . " " . $valor["email"] . " " . $valor["tlf"];
        echo "<br/>";
    }
    ?>
</body>
</html>