<?php
/**
 * Enunciado: Contador 
 * @author javier ruiz molero
*/

if(!isset($_COOKIE["contador"])){
    setcookie("contador", 0, time()+3600);
} else {
    setcookie("contador", $_COOKIE["contador"] + 1, time()+3600);

    echo $_COOKIE["contador"];
}
?>
<a href="https://github.com/javierrm11/dwes/blob/main/UNIDAD4/cookies/clase/04-cookies.php">Enlace a repositorio</a>
