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
function eliminarDato()
{
    $db = conectaDB();
    $id = $_GET["id"];
    $sql = "DELETE FROM perros WHERE id LIKE :id";

    $consulta = $db->prepare($sql); 
    if($consulta->execute(array(":id" => $id))){
        header("location: ./index.php");
    } else{
        echo "mal";
    }
}
eliminarDato();