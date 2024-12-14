<?php
function conectaDB() {
    try{
        $dsn = "mysql:host=localhost;dbname=mascotas";
        $db = new PDO($dsn, "mascotas", "1234");
        $db-> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
        return($db);
    }
    catch (PDOException $e){
        echo "Error de conexion";
        exit();
    }
}


if(isset($_POST["anadiritem"])){
    $db =conectaDB();

    $sql = "insert into perros(nombre, peso,raza) values(:nombre, :peso, :raza)";
    $consulta = $db->prepare($sql); 
    $aParametros = array(":nombre" => $_POST["nombre"] ?? "", ":peso" => $_POST["peso"] ?? 0, ":raza" => $_POST["raza"] ?? "");
    
    if($consulta->execute($aParametros)) header("location: index.php");
    
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
    <h2>Nueva Mascota</h2>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="peso">Peso</label>
        <input type="text" name="peso">
        <label for="raza">Raza</label>
        <input type="text" name="raza">

        <input type="submit" value="Añadir" name="anadiritem">
    </form>
</body>
</html>