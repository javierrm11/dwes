<?


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
            foreach ($cursos as $curso ) {
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