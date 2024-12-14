<?php
/**
 * Enunciado: Crear cookie de duracion limitada
 * @author javier ruiz molero
*/

// Eliminar cookie
setcookie("nombre","Javier",time()+60); 

if(isset($_COOKIE["nombre"])){
    echo $_COOKIE["nombre"];


}
?>
<a href="https://github.com/javierrm11/dwes/blob/main/UNIDAD4/cookies/clase/01-cookies.php">Enlace a repositorio</a>
