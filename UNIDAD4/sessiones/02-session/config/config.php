<?php
/**
 * 2-6
 * 3-4
 * 7-12
 * 8-10
 * 9-11
 * 1-5
*/

// piezas individuales
$piezas = [
    1 => "./piezas/1.JPG",
    2 => "./piezas/2.JPG",
    3 => "./piezas/3.JPG",
    4 => "./piezas/4.JPG",
    5 => "./piezas/5.JPG",
    6 => "./piezas/6.JPG",
    7 => "./piezas/7.JPG",
    8 => "./piezas/8.JPG",
    9 => "./piezas/9.JPG",
    10 => "./piezas/10.JPG",
    11 => "./piezas/11.JPG",
    12 => "./piezas/12.JPG",
];

// figuras hechas
$figuras = [
    [[$piezas[1], $piezas[5]], "calamar"],
    [[$piezas[2], $piezas[6]], "pato"],
    [[$piezas[3], $piezas[4]], "leon"],
    [[$piezas[7], $piezas[12]], "conejo"],
    [[$piezas[8], $piezas[10]], "sapo"],
    [[$piezas[9], $piezas[11]], "delfin"]
];