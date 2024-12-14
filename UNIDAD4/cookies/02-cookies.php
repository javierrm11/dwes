<?php
/**
 * Escriba una página que compruebe si el navegador permite crear cookies y se
 * lo diga al usuario (mediante una o más páginas).
 * @author javier Ruiz Molero
*/
$cookie_enabled = "";
$lProcesa = false;
// formulario comprobar cookie
if(isset($_POST["cookie"])){
    setcookie("nombre", "cookie", time()+3600);
    $lProcesa = true;
}
// mostrar cookie
if($lProcesa){
    $cookie_enabled = isset($_COOKIE['nombre']); // devuelve 1 o 0
    if($cookie_enabled){
        $mensaje = "Las cookies estan habilitadas";
    } else{
        $mensaje = "Las cookies estan desabilitadas";
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
    <?php
    if(!$lProcesa){ ?>
        <h1>Comprobar si esta habilitado las cookies en tu navegador</h1>
        <form action="" method="post">
            <input type="submit" name="cookie" value="comprobar cookie">
        </form>
    <?php } else{
        echo $mensaje;
    } ?>
</body>
</html>

