<?php
/**
 * Haz un programa que permita buscar perros por su nombre.
 * @author Javier Ruiz Molero
 */
session_start();
if(!isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = [];
}

$data["mascotas"] = [];
$data["usuario"] = ["auth" => false,"nombreUs" => "Invitado"];

include("./functions/functions.php");

/* inicio sesion */
if(isset($_POST["inicioSesion"])){
    $db = conectaDB();
    $usuario = $_POST['usuario'] ?? "";
    $contrasena = $_POST['contrasena'] ?? "";
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
    $consulta = $db->prepare($sql); 
    $consulta->execute(array(":usuario" => $usuario, ":contrasena" => $contrasena));
    $resultado = $consulta -> fetchAll();
    var_dump($resultado);
    $numRegis = $consulta ->rowCount();
    

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
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD6/bdperros">Enlace a repositorio</a>
    <header>
        <h1>Gestión de mascotas</h1>
        <div>
            <?php
                if($data["usuario"]['auth']){
                    echo "<p>Bienvenido $data[usuario][nombreUs]</p>";
                    echo "<a>Cerrar sesión</a>";
                } else{
                    include("./views/loginView.php");
                }
            ?>
        </div>
    </header>
    <form action="" method="post">
        <label for="busqueda">Busqueda</label>
        <input type="text" name="busqueda" id="" value="<?php $valorBusqueda?>"><br/>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <form action="nuevo.php" method="post">
        <input type="submit" value="+" name="enviaranadir">
    </form>
    <h2>Busqueda</h2>
    <?php 
    busqueda();
    ?>
</body>
</html>