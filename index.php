<?php
require "./configuracion/configuracion.php";
require "./configuracion/cookie.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Ruiz Molero | Portfolio</title>
    <link rel="stylesheet" href="./bitnami.css">
</head>
<body>
    <header>
        <h3>Javier R.M</h3>
        <nav>
            <a href="">Inicio</a>
            <a href="">Sobre Mi</a>
            <a href="#proyectos">Proyectos</a>
            <a href="">Contacto</a>
        </nav>
        <div id="contador">
            <h3>Contador: <?php echo $_COOKIE["contador"] ?></h3>
        </div>
    </header>
    <main>
        <h1>PORTFOLIO</h1>
        <div class="divy">
            <img src="./img/yo.jpg" alt="" srcset="">
            <div class="divInfo">
                <h4>Datos Personales</h4>
                <p>Javier Ruiz Molero</p>
                <p>19 Años</p>
                <p>Villafranca de Córdoba</p>
            </div>
            <div class="estudios">
                <h4>Estudios</h4>
                <p>ESO</p>
                <p>Grado Medio de Microinformática y redes</p>
                <p>En proceso: Grado superior de Desarrollo de Aplicaciones Web</p>
            </div>
        </div>
        <section id="proyectos">
            <h4>Ejercicios</h4>
            <div class="unidades">
            <?php
            foreach($ejercicios as $unidad => $subcarpetas){
                echo "<div class='unidad'>";
                echo "<h1>$unidad</h1>";
                if(is_array($subcarpetas)){
                    foreach($subcarpetas as $subcarpeta => $archivos){
                        if(is_array($archivos)){
                            echo "<h3>$subcarpeta</h3>";
                            foreach($archivos as $archivo => $ruta){
                                if (is_array($ruta)){
                                    echo "<h6>$archivo</h6>";
                                    foreach($ruta as $fichero => $ruta1){
                                        echo "<a href='$ruta1'>$fichero</a>";
                                    }
                                } else{
                                    echo "<a href='$ruta'>$archivo</a>";
                                }
                            }
                        } else {
                            echo "<a href='$archivos'>$subcarpeta</a>";
                        }
                    }  
                    echo "</div>"; 
                } else {
                    echo "<h6>$unidad</h6>";
                }
            }
            ?>
            </div>
        </section>
    </main>
</body>
</html>