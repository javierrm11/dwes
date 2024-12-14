<?php
/**
 * Escriba una página que permita crear una cookie de duración limitada,
 * comprobar el estado de la cookie y destruirla.
 * @author Javier Ruiz Molero
*/

// Crear variables
$mError = "";
$cookie = false;
$nombreCookie = "";

// Crear cookie
if(isset($_POST["crearCookie"])){
    $nombre = $_POST["nombre"];
    if($nombre == ""){
        $mError = "Debes de introducir el nombre";
    } else{
        setcookie("nombre",$nombre, time()+ 3600);
        $cookie = true;
    }
}

// Ver cookie
$nombreCookie = $_COOKIE["nombre"];

// eliminar cookie
if(isset($_POST["destruirCookie"])){
    setcookie("nombre", "", time() -3600);
    $cookie = false;
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
    <?php
    if(!$cookie){ ?>
    <form action="" method="post">
        <label for="nombre">Nombre</label><br/>
        <input type="text" name="nombre" id=""><?php echo $mError?><br/>
        <input type="submit" value="Crear Cookie" name="crearCookie">
    </form>
    <?php } else{ ?>
    <h3>Cookie</h3>
    <p><?php echo $nombreCookie ?></p>
    <form action="" method="post">
        <input type="submit" value="Destruir Cookie" name="destruirCookie">
    </form>
    <?php } ?>
</body>
</html>