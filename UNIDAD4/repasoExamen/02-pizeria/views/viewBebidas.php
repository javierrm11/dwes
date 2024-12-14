<?php
require "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-wrap: wrap;
        }
        article div{
            flex: 1;
        }
    </style>
</head>
<body>
    <h1>Bebidas</h1>
    <a href="../index.php">Volver a la pagina principal</a>
    <article id="bebidas">
        <form action="" method="post">
            <?php
            foreach (PRODUCTOS["bebidas"] as $bebida) { ?>
                <div>
                    <h3><?php echo $bebida["nombre"] ?></h3>
                    <img src="../img/<?php echo $bebida["imagen"] ?>" alt="" srcset="">
                    <p>Precio: <?php echo $bebida["precio"] ?></p>
                    <?php echo "<input type=\"button\" name=\"anadir$bebida[nombre]\" value=\"Añadir al carrito\">" ?>
                </div>     
            <?php } ?>
        </form>
    </article>
</body>
</html>
