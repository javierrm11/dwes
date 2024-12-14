<?php
if(isset($_POST["submit"])){
    $lProcesaFormulario = true;
}

if($lProcesaFormulario){
    $grupo_sel = $_POST["grupo"];
    $curso_sel = $_POST["curso"];
    $sistema_sel = $_POST["sistema"];

    if(!empty($grupo_sel) && !empty($curso_sel) && !empty($sistema_sel)){
        echo $grupo_sel . " " . $curso_sel . " " . $sistema_sel;
    }
}