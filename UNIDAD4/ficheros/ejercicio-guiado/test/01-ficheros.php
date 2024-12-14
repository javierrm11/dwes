<?
/**
 * 1. Crear un formulario que permita subir un fichero al servidor.
 * 2. El formulario debe tener los siguientes campos:
 *     - Un campo de selección con los grupos de la ETSIIT (2020/2021, 2021/2022, 2022/2023, 2023/2024, 2024/2025)
 *    - Un campo de selección con los cursos de DAW (1º DAW, 2º DAW)
 *   - Un campo de selección con los sistemas operativos (Linux, MySql)ç
 *  - Un campo de tipo file para seleccionar el fichero a subir
 * - Un botón de envío
 * 3. El formulario debe enviar los datos a un script PHP que se encargará de subir el fichero al servidor.
 * 4. El script PHP debe comprobar que el fichero se ha subido correctamente y mostrar un mensaje de éxito o error.
 * 5. El fichero subido debe guardarse en una carpeta llamada "uploads" en la raíz del proyecto.
 * @author Javier Ruiz Molero
 */


$grupos = [
    2020 => "2020/2021",
    2021 => "2021/2022",
    2022 => "2022/2023",
    2023 => "2023/2024",
    2024 => "2024/2025"
];
$cursos = ["1º DAW", "2ºDAW"];
$sistemas = ["Linux", "MySql"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier</title>
    <style>
        label {
            display: block;
            margin-top: 2vh;
        }
    </style>
</head>

<body>
    <a href="">Enlace a repositorio</a>
    <h1>Subir fichero</h1>
    <form method="post" action="./uploadFile.php" enctype="multipart/form-data">
        <label for="grupo">Grupos</label>
        <select name="grupo" id="">
            <?
            foreach ($grupos as $grupo => $anio) {
                echo "<option value ='$grupo'>$anio</option>";
            }
            ?>
        </select>

        <label for="curso">Curso</label>
        <select name="curso" id="">
            <?
            foreach ($cursos as $curso) {
                echo "<option value ='$curso'>$curso</option>";
            }
            ?>
        </select>

        <label for="sistema">Sistema</label>
        <select name="sistema" id="">
            <?php
            foreach ($sistemas as $sistema) {
                echo "<option value ='$sistema'>$sistema</option>";
            }
            ?>
        </select>

        <input type="file" name="file" id="file">

        <input type="submit" value="Enviar" name="submit">
    </form>

</body>

</html>