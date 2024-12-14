<?php
/**
 * Recoger datos y procesar form 
*/

include("../configuracion/config.php");

// fecha actual
$mActual = date("m");
$aActual = date("Y");

//$mActual = 9;
//$aActual = 2024;
$check = false;

$av_array = [];

for ($i = A_INCIO; $i <= A_FINAL; $i++) {
    $anno = $i . "/" . ($i + 1);
    if (($i == $aActual && $mActual >= 8) || ($i + 1 == $aActual && $mActual <= 8)) {
        $check = true;
        $av_array[] = [$anno, $check];
    } else {
        $check = false;
        $av_array[] = [$anno, $check];
    }
}

var_dump($av_array);
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
    <form method="post" action="procesaForm.php" enctype="multipart/form-data">
        <label for="grupo">Grupos</label>
        <select name="grupo" id="">
        <?
            foreach ($av_Anios as $grupo => $arrays) {
                foreach ($arrays as $array => $value) {
                    echo "<option value ='$array'>$value</option>";
                }
                
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
