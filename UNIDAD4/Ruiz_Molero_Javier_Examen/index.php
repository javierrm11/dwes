<?php
// iniciar sesion
session_start();

// incluir configuracion
require "./config/config.php";

//variables
$baraja = [];
$puntuacionUs = 0;
$puntuaciones = 0;
$ganador = "";

// arrays cartas por mano
if(!isset($_SESSION["cartasUsuario"])){
    $_SESSION["cartasUsuario"] = [];
}
if(!isset($_SESSION["cartasBanca"])){
    $_SESSION["cartasBanca"] = [];
}

//barajar el mazo
shuffle($cartas);

//Obtener dos cartas para el usuario y banca
if($_SESSION["cartasUsuario"] == []){
    //nueva baraja
    $_SESSION["baraja"] = $cartas;
    $baraja = $_SESSION["baraja"];

    //iniciar puntuacion us
    $_SESSION["puntuacionUs"] = 0;
    $_SESSION["puntuacionBanca"] = 0;

    //crear cartas inicio
    for ($i=0; $i < 2; $i++) {
        // usuario
        $tipo = array_rand($baraja);
        $valor = array_rand($baraja[$tipo]);
        $_SESSION["cartasUsuario"][] = [$tipo, $valor];
        //banca
        $tipo = array_rand($baraja);
        $valor = array_rand($baraja[$tipo]);
        $_SESSION["cartasBanca"][] = [$tipo, $valor];
    }
    //riesgo banca
    $_SESSION["riesgo"] = rand(17,21);
}

//puntaje usuario
foreach ($_SESSION["cartasUsuario"] as $cartas => $carta) {
    $punto = $carta[1];
    if($carta[1] == "J" || $carta[1] == "K" || $carta[1] == "Q"){
        $punto = 10; 
    }
    $_SESSION["puntuacionUs"] += $punto;
}

//puntaje banca
foreach ($_SESSION["cartasBanca"] as $cartas => $carta) {
    $punto = $carta[1];
    if($carta[1] == "J" || $carta[1] == "K" || $carta[1] == "Q"){
        $punto = 10; 
    }
    $_SESSION["puntuacionBanca"] += $punto;
}


//pedir carta
if(isset($_POST["pedirCarta"])){
    $tipo = array_rand($_SESSION["baraja"]);
    $valor = array_rand($_SESSION["baraja"][$tipo]);
    $_SESSION["cartasUsuario"][] = [$tipo, $valor];

    //añadir carta banca
    $tipo = array_rand($_SESSION["baraja"]);
    $valor = array_rand($_SESSION["baraja"][$tipo]);
    $_SESSION["cartasBanca"][] = [$tipo, $valor];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Ruiz Molero</title>
</head>
<body>
    <h1>Blackjack (21)</h1>
    <a href="cerrarSesion.php">CerrarSesion</a>
    <div>
        <h3>Mano Jugador</h3>
        <?php
        foreach ($_SESSION["cartasUsuario"] as $cartas => $carta) {
            echo $cartas . " -> " . $carta[1]."<br/>";
        }
        ?>
        <p>Puntucaion:</p>
        <p><?php echo $_SESSION["puntuacionUs"] ?></p>
    </div>
    <div>
        <h3>Mano Banca</h3>
        <?php
        foreach ($_SESSION["cartasBanca"] as $cartas => $carta) {
            echo $cartas . " -> " . $carta[1]."<br/>";
        }
        ?> 
        <p>Puntucaion:</p>
        <p><?php echo $_SESSION["puntuacionBanca"] ?></p>
    </div>
    <form action="" method="post">
        <input type="submit" value="Pedir Carta" name="pedirCarta">
    </form>
</body>
</html>
