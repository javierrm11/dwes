<?php
/**
 * 1. Crear un formulario de login con los campos nombre de usuario y contraseña.
 * 2. Validar los campos del formulario.
 * 3. Crear un array con los usuarios y contraseñas válidos.
 * 4. Comprobar que el usuario y la contraseña introducidos en el formulario coinciden con los almacenados en el array.
 * 5. Si los datos son correctos, iniciar sesión y redirigir a una página de tareas.
 * 6. Si los datos no son correctos, mostrar un mensaje de error.
 * 7. Crear una página de tareas con un listado de tareas.
 * 8. Crear un formulario para añadir tareas.
 * 9. Crear un formulario para editar tareas.
 * 10. Crear un formulario para borrar tareas.
 * 11. Crear un botón para cerrar sesión.
 * @author Javier Ruiz Molero
 */
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
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD4/repasoExamen/01">Enlace a repositorio</a>
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