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

// Consulta sin preparar (no usar)
function insertarDato()
{
    $db = conectaDB();
    $nombre = "hector";
    $sql = "insert into perros(nombre, peso,raza) values('".$nombre."', 1, 'lushia')";
    if($db->query($sql)){
        echo "Bien";
    } else{
        echo "mal";
    }
}

// Consulta preparada (usar)
function extraerDatos()
{
    $db = conectaDB();
    $sql = "SELECT * FROM perros";
    $consulta = $db->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    echo "<br/>";
    foreach ($resultado as $valor) {
        echo $valor["nombre"] . " " . $valor["peso"] . " " . $valor["raza"] . " ". "<br/>";
    }
}
// Consulta de busqueda de perros
function busqueda()
{
    $db = conectaDB();
    $campo = $_POST['busqueda'] ?? "";
    $valorBusqueda = $campo;
    $sql = "SELECT * FROM perros WHERE nombre LIKE :campo OR raza LIKE :campo";

    $consulta = $db->prepare($sql); 
    $consulta->execute(array(":campo" => "$campo%"));
    $data["mascotas"] = $consulta->fetchAll(); // almacenamos lo datos en un array bidimensional indexado asociativo
    if(!$data["mascotas"]){
        echo "Error en la consulta";
    } else{
        foreach ($data["mascotas"] as $valor) {
            echo $valor["nombre"] . " " . $valor["peso"] . " " . $valor["raza"] . " <a href=\"./del.php?id=$valor[id]\">Borrar</a>". "<br/>";
        }
    }
}
