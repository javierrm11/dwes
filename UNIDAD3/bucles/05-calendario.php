<?php
/**
 * Enunciado:
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el
 * calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 * en rojo.    
 * @author Javier Ruiz Molero 
 **/

// Mes y anio (numero)
$diaActual = date("d");
$mesActual = date("m");
$anioActual = date("Y");

// Dias festivos
$festivos = [
    "$anioActual-01-01",
    "$anioActual-01-06",
    "$anioActual-02-28",
    "$anioActual-03-28",
    "$anioActual-03-29",
    "$anioActual-05-01",
    "$anioActual-08-15",
    "$anioActual-09-09",
    "$anioActual-10-12",
    "$anioActual-10-24",
    "$anioActual-11-01", 
    "$anioActual-12-06",
    "$anioActual-12-09",
    "$anioActual-12-25"
];

// Obtener el nombre del mes
$nombreMes = date("F", mktime(0, 0, 0, $mesActual, 1, $anioActual));

// Obtener el primer día del mes
$primerDia = mktime(0, 0, 0, $mesActual, 1, $anioActual);
$diaInicio = date("w", $primerDia); // Día de la semana del primer día del mes
$diasEnMes = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual); // Total de días en el mes
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <style>
        h1 {
            font-size: 3rem;
            text-align: center;
            font-family: system-ui;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Para evitar bordes dobles */
        }
        th {
            font-size: 1.5rem;
            font-family: system-ui;
        }
        td {
            text-align: center;
            font-family: system-ui;
            font-size: 1rem;
            padding: 1rem;
        }
        .fin-de-semana {
            background-color: lightgray; /* Color para sábados y domingos */
        }
        .nombresSemana{
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>
    <a href="">Enlace al repositorio</a>
    <h1>Calendario de <?= $nombreMes ?> de <?= $anioActual ?></h1>
    <table>
        <tr class="nombresSemana">
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
        <?php
        // Espacio en blanco para los días del mes anterior
        for ($i = 0; $i < $diaInicio; $i++) {
            echo "<td></td>";
        }
        // Días del mes actual
        for ($dia = 1; $dia <= $diasEnMes; $dia++) {
            // Formato de la fecha
            $fechaActual = "$anioActual-$mesActual-" . str_pad($dia, 2, '0', STR_PAD_LEFT);
    
            // Comprobar el día de la semana
            $diaDeLaSemana = date("w", mktime(0, 0, 0, $mesActual, $dia, $anioActual));
            
            // Aplicar estilos según el día
            if (in_array($fechaActual, $festivos)) {
                echo "<td style='background-color: red; color: white;'>" . $dia . "</td>";
            } elseif ($dia == $diaActual) {
                echo "<td style='background-color: green; color: white;'>" . $dia . "</td>";
            } elseif ($diaDeLaSemana == 5 || $diaDeLaSemana == 6) { // Domingo (6) o Sábado (5)
                echo "<td class='fin-de-semana'>" . $dia . "</td>";
            } else {
                echo "<td>" . $dia . "</td>";
            }

            // Si es domingo, iniciar una nueva fila
            if ($diaInicio % 7 == 6) {
                echo "</tr><tr>";
            }

            $diaInicio++;
        }
        echo "</tr>";
        echo "</table>";
        ?>
    </table>
</body>
</html>
