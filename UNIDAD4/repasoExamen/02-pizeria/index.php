<?php
/**
 * Pizzería
 * @author Javier Ruiz Molero
 */
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Pizzería</title>
</head>
<body>
    <a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD4/repasoExamen/02-pizeria">Enlace a repositorio</a>
    <header>
        <nav>
            <a href="./views/viewPizzas.php">Pizzas</a>
            <a href="./views/viewBebidas.php">Bebidas</a>
            <a href="./views/viewPostres.php">Postres</a>
            <a href="./views/viewCarrito.php">Carrito</a>
        </nav>
    </header>
    <main>
        <h3>Carrito</h3>
        <?php
        if (!empty($_SESSION["carrito"])) {
            foreach ($_SESSION["carrito"] as $producto) {
                echo "<p>" . $producto[0] . " - " . "Precio: " . $producto[2] . " - " . "Cantidad: " . $producto[3] ."</p>";
            }
        } else {
            echo "<p>El carrito está vacío</p>";
        }
        ?>
    </main>
</body>
</html>
