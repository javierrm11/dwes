<?php
// iniciar sesion
session_start();

// asignar variables
$nombreUsuario = $contrasena = "";
$errorUsuario = $errorContrasena = $errorCredenciales = "";
$error = false;


// procesar formulario login
if(isset($_POST["login"])){
    $nombreUsuario = $_POST["nombreUsuario"];
    $contrasena = $_POST["contrasena"];

    // manejo de errores
    if($nombreUsuario == ""){
        $errorUsuario = "El campo nombre es obligatorio";
        $error = true;
    }
    if($contrasena == ""){
        $errorContrasena = "El campo contrasena es obligatorio";
        $error = true;
    }
    if(!$error){
        include("./funciones/leerUsuarios.php");
        foreach ($usuarios as $usuario) {
            if($nombreUsuario == $usuario[0] && $contrasena == $usuario[1]){
                $_SESSION["usuario"] = [$nombreUsuario, $contrasena];
                header("location: ./views/viewTareas.php");    
            } else{
                $errorCredenciales = "El nombre de usuario o la contraseña no son validos";
            }
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
    <form action="" method="post">
        <label for="nombreUsuario">Nombre Usuario</label><br/>
        <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuario ?>"><?php echo $errorUsuario ?><br/>

        <label for="contrasena">Contraseña</label><br/>
        <input type="text" name="contrasena" value="<?php echo $contrasena ?>"><?php echo $errorContrasena ?><br/>

        <input type="submit" value="Login" name="login"><br/>
        <?php echo $errorCredenciales ?>
    </form>
</body>
</html>