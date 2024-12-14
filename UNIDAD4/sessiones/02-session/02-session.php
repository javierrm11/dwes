<?php
/**
 * Se debe crear una aplicación que permita resolver puzles infantiles de tres
 * piezas. Se adjunta fichas de ejemplo, pero es necesario que personalices las
 * fichas del rompecabezas.
 * Aplica criterios de usabilidad en el diseño de la aplicación intentando conseguir la
 * mejor experiencia de usuario.
 * @author Javier Ruiz Molero
*/

//iniciar sesion
session_start();

// implementar configuracion
require "./config/config.php";

// variable
$comprobar = false;
$resultado = "";

// crear sesion con la figura y que sea aleatoria
if(!isset($_SESSION["figuras"])){
    $i = array_rand($figuras);
    $_SESSION["figuras"] = [$figuras[$i][0], $figuras[$i][1]];
}

// Crear 2 piezas aleatorias
if(!isset($_SESSION["piezasAl"])){
    $indice1 = array_rand($piezas);
    $indice2 = array_rand($piezas);
    $_SESSION["piezasAl"] = [$piezas[$indice1], $piezas[$indice2]];
}

// Cambiar pieza arriba
if(isset($_POST["cambio1"])){
    $indice = array_rand($piezas);
    $_SESSION["piezasAl"][0] = $piezas[$indice];
}

// Cambiar pieza abajo
if(isset($_POST["cambio2"])){
    $indice = array_rand($piezas);
    $_SESSION["piezasAl"][1] = $piezas[$indice];
}

// Resultados
if(!isset($_SESSION["resultados"])){
    $_SESSION["resultados"] = [0,0];
}

// Comprobar
if(isset($_POST["enviar"])){
    if($_SESSION["piezasAl"] == $_SESSION["figuras"][0]){
        $resultado = "Figura correcta";
        $_SESSION["resultados"][0] = $_SESSION["resultados"][0] + 1;
    } else {
        $resultado = "Figura incorercta";
        $_SESSION["resultados"][1]++;
    }

    $comprobar = true;
}

// Volver a jugar
if(isset($_POST["volver"])){
    $comprobar = false;
    // generar nueva figura a resolver
    $i = array_rand($figuras);
    $_SESSION["figuras"] = [$figuras[$i][0], $figuras[$i][1]];

    //generar nuevas piezas aleatorias
    $indice1 = array_rand($piezas);
    $indice2 = array_rand($piezas);
    $_SESSION["piezasAl"] = [$piezas[$indice1], $piezas[$indice2]];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pieza{
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD4/sessiones/02-session">Enlace a repositorio</a>
    <h1>Puzles Infantiles</h1>
    <h2><?php echo $_SESSION["figuras"][1] ?></h2>
    <div class="pieza">
        <img src="<?php echo $_SESSION["piezasAl"][0] ?>" alt="" srcset="">
        <form action="" method="post">
            <input type="submit" value="Cambiar pieza" name="cambio1">
        </form>
    </div>
    <div class="pieza">
        <img src="<?php echo $_SESSION["piezasAl"][1] ?>" alt="" srcset="">
        <form action="" method="post">
            <input type="submit" value="Cambiar pieza" name="cambio2">
        </form>
    </div>
    <form action="" method="post">
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    if($comprobar){
        echo "<p>$resultado</p>";
        echo "<p>Aciertos:" . $_SESSION["resultados"][0] ."</p>";
        echo "<p>Fallos:" . $_SESSION["resultados"][1] ."</p>";
    
    ?>
    <form action="" method="post">
        <input type="submit" value="Volver a jugar" name="volver">
    </form>

    <?php } ?>
</body>
</html>