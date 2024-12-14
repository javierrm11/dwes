<?php
/**
 * Crea un sistema básico de autenticación en PHP. El objetivo es permitir que los
 * usuarios se autentiquen con un nombre de usuario y una contraseña para acceder al
 * área protegida.
 * Utiliza un array de configuración para almacenar los usuarios registrados en el
 * sistema.
 * Si no estamos autenticados en el sistema, la página de inicio mostrará: formulario de
 * login, información pública de inicio y menú de navegación por la zona pública.
 * Si estamos autenticados en el sistema, la página de inicio mostrará: información de
 * usuario con opción de cierre de sesión, hora de inicio de sesión, información pública
 * de inicio y menú de navegación por la zona pública y privada.
 * Las páginas de la aplicación solo deben mostrar un mensaje indicando si son públicas
 * o privadas.
 * @author javier Ruiz Molero
*/

/* Modifica el ejercicio anterior incluyendo varios perfiles de usuario. */


// iniciar sesion
session_start();
// incluir usuarios de configuracion
require "./conf/config.php";
// creacion de variables
$autentificado = false;
$nombreUsuario = $contrasena = "";
$mErrorUs = $mErrorCon = "";
$mErrorCreden = "";
$error = false;
$perfil = "";


// formulario de login con errores
if(isset($_POST["login"])){
    $nombreUsuario = $_POST["nombreUsuario"];
    $contrasena = $_POST["contrasena"];

    if($nombreUsuario == ""){
        $mErrorUs = "Debes de introducir un usuario";
        $error = true;
    }
    if($contrasena == ""){
        $mErrorCon = "Debes de introducir una contraseña";
        $error = true;
    }
}

// Comprobar credenciales
if(!$error){
    foreach ($usuariosRegistrados as $usuario) {
        if($nombreUsuario == $usuario[0] && $contrasena == $usuario[1]){
            //Ver perfil usuario
            $perfil = $usuario[2];
            // añadir sesion del usuario
            $_SESSION["usuario"] = [$nombreUsuario, $contrasena, $perfil];
            $autentificado = true;
        } else{
            // mensaje error de credenciales
            $mErrorCreden = "El usuario y la contraseña no son correctos";
        }
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
    <a href="">Enlace a repositorio</a>
    <h1>AUTENTIFICACION</h1>
    <p>Informacion Publica</p>
    <?php
    if($autentificado){
        echo "<a href=\"cerrarSesion.php\">Cerrar Sesion</a> <br/>";
        echo "Nombre de usuario:" . $_SESSION["usuario"][0] . "<br/>";
        echo "Contraseña:" . $_SESSION["usuario"][1] . "<br/>";
        if($perfil == "admin"){
            echo "Eres administrador";
        } else {
            echo "Eres cliente";
        }
    } else { ?>
        <form action="" method="post">
            <label for="nombreUsuario">Nombre Usuario</label><br/>
            <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuario ?>"><?php echo $mErrorUs ?><br/>

            <label for="contrasena">Contraseña</label><br/>
            <input type="text" name="contrasena" value="<?php echo $contrasena ?>"><?php echo $mErrorCon ?><br/>

            <input type="submit" value="Login" name="login"><br/>
            <?php echo $mErrorCreden ?>
        </form>
    <?php } ?>
</body>
</html>