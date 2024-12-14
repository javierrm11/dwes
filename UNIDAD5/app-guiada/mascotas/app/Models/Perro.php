<?php
namespace App\Models;
class Perro{
    private $_color;
    private $_nombre;
    private $_habilidad;
    private $_sociabilidad;

    public function __construct($nombre,$color) {
        $this->_color = $color;
        $this->_nombre = $nombre;
        $this->_habilidad = 0;
        $this->_sociabilidad = 5;
    }

    public function entrenar(){
        echo "<br/>Dar la patada";
        if($this->_habilidad <=100) $this->_habilidad++;

    }

    public function darPata(){
        $retorno = "<br/>Como";
        if($this->_habilidad > 5){
            $retorno = 'Levantar pata';
        }
        echo $retorno;
    }
}