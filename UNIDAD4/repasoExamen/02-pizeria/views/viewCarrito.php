<?php
session_start();
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