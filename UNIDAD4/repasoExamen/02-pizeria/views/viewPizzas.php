<?php
require "../config/config.php";
// iniciar sesion
session_start();
$pizzasSeleccionadas = [];


foreach (PRODUCTOS["pizzas"] as $indice => $pizza) {
    $tipo = $_POST["tipo"] ?? "";
    $cantidad = $_POST["cantidad"] ?? 1;
    if(isset($_POST["anadir$indice"])){
        $_SESSION["carrito"][] = [$pizza["nombre"], $pizza["imagen"], $tipo, $cantidad];
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
    <style>
        article{
            display: flex;
            flex-wrap: wrap;
        }
        article div{
            flex: 1;
        }
        #anadir{
            flex: 0 0 100%;
        }
    </style>
</head>
<body>
    <h1>Pizzas</h1>
    <a href="../index.php">Volver a la pagina principal</a>
    <a href="../cerrarSesion.php">Cerrar Sesion</a>
    <article id="pizzas">
            <?php
            foreach (PRODUCTOS["pizzas"] as $indice => $pizza) { ?>
                <div>
                    <h3><?php echo $pizza["nombre"] ?></h3>
                    <img src="../img/<?php echo $pizza["imagen"] ?>" alt="" srcset="">
                    <h4>Precios</h4>
                    <?php
                    foreach ($pizza["precio"] as $tipo => $precio) {
                        echo "<p>$tipo => $precio</p>";
                    }?>
                    <form action="" method="post">
                        <label for="tipo">Tamaño</label>
                        <select name="tipo" id="tipo">
                            <?php
                            foreach ($pizza["precio"] as $tipo => $precio) {
                                echo "<option name=\"tipo\" value=\"$precio\">$tipo</option>";
                            }
                            ?>
                        </select>
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" value="1">
                        <input type="submit" value="añadir al carrito" name="anadir<?php echo $indice ?>" value="Añadir al carrito">
                    </form>
                </div>     
            <?php } ?>
    </article>
</body>
</html>
