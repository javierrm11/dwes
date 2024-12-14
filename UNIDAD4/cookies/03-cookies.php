<?php
/**
 * Crea un formulario de login que permita al usuario recordar los datos
 * introducidos. Incluye una opción para borrar la información almacenada.
 * @author javier Ruiz Molero 
*/

// declarar variables
$lProcesaFormulario = false;
$mErrorUs = $mErrorCon = "";
$usuario = "";
$contrasena = "";
if(isset($_POST["login"])){
    $lProcesaFormulario = true;
}
// Procesar formulario
if($lProcesaFormulario){
    $usuario = $_POST["usuario"] ?? "";
    $contrasena = $_POST["contrasena"] ?? "";
    // mensajes de error
    if($usuario == ""){
        $mErrorUs = "Debes de introducir el nombre de usuario";
        $lProcesaFormulario = false;
    }
    if($contrasena == ""){
        $mErrorCon = "Debes de introducir la contrasena";
        $lProcesaFormulario = false;
    }
    // recordar credenciales
    if(isset($_POST["recordar"])){
        setcookie("usuario", $usuario, time()+3600);
        setcookie("contrasena", $contrasena, time()+3600);
    }
}
if(isset($_POST["eliminarRecordar"])){
    // eliminar credenciales guardados
    if(isset($_POST["eliminarRecordar"])){
        setcookie("usuario", "", time()-3600);
        setcookie("contrasena", "", time()-3600);
    }
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
    <?php
    if($lProcesaFormulario){
        echo "<h2>Nombre de Usuario: $usuario</h2>";
        echo "<h3>Contrasena: $contrasena</h3>";
    } else { ?>
    <form action="" method="post">
        <label for="usuario">Usuario</label><br/>
        <input type="text" name="usuario" id="" value="<?php echo isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : $usuario ?>"><?php echo $mErrorUs ?><br/>
        <label for="contrasena">Contraseña</label><br/>
        <input type="text" name="contrasena" id="" value="<?php echo isset($_COOKIE["contrasena"]) ? $_COOKIE["contrasena"] : $contrasena ?>"><?php echo $mErrorCon ?><br/>

        <label for="recordar">Recordar</label>
        <input type="checkbox" value="Recordar" name="recordar"><br/>

        <label for="eliminarRecordar">Eliminar credenciales guardadas</label>
        <input type="submit" value="Login" name="login">
    </form>
    <form action="" method="post">
        <input type="submit" value="Eliminar credenciales guardadas" name="eliminarRecordar">
    </form>
    <?php } ?>
</body>
</html>