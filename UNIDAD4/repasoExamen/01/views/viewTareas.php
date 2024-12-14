<?php
//iniciar sesion
session_start();
// incluir leer las tareas
require_once "../funciones/leerTareas.php";

//variables
$inputTarea = "";
$errorInputTarea = "";
$tareaComple = "";

cargarTareas();
//añadir tarea
if(isset($_POST["anadir"])){
    $inputTarea = $_POST["inputTarea"];

    if($inputTarea == ""){
        $errorInputTarea = "No puede estar vacio";
    } else {
        $_SESSION["tareas"][] = ["tarea" => $inputTarea, "completada" => false];
        guardarTareas();
    }
}

// Marcar tarea como completada
foreach ($_SESSION["tareas"] as $index => $tarea) { // Iterar por índice
    if (isset($_POST["tarea$index"])) {
        $_SESSION["tareas"][$index]["completada"] = true; 
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
    <header>
        <p>Nombre de usuario: <?php echo $_SESSION["usuario"][0] ?></p>
        <a href="../funciones/cerrarSesion.php">Cerrar Sesion</a>
    </header>
    <br/>
    <main>
        <form action="" method="post">
            <label for="inputTarea">Nueva Tarea</label>
            <input type="text" name="inputTarea"><?php echo $errorInputTarea ?>

            <input type="submit" value="Añadir tarea" name="anadir">
        </form>

        <div>
            <h2>Tareas</h2>
            <?php
            foreach ($_SESSION["tareas"] as $index => $tarea) {
                echo $tarea["tarea"];
                echo $tarea["completada"] ? "(completada)" : ""; ?>
                <form action="" method="post">
                    <input type="submit" value="Marcar como completada" name="<?php echo "tarea".$index ?>">
                </form>
            <?php
            } ?>
        </div>
        
    </main>
</body>
</html>