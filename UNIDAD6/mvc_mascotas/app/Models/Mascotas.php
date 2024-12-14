<?php
# Importar modelo de abstracción de base de datos
require_once("DBAbstractModel.php");
class Mascotas extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
    private $id;
    private $nombre;
    private $peso;
    private $raza;
    private $created_at;
    private $updated_at;

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getRaza()
    {
        return $this->raza;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }
    public function setRaza($raza) {
        $this->raza = $raza;
    }

    //mensaje
    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function get($id = ""){
        if($id != "") {
            $this->query = "SELECT * FROM perros WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            if(count($this->rows) == 1){
                foreach ($this->rows[0] as $propiedad=>$valor){
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Perros encontrado.';
            } else {
                $this->mensaje = 'Perros no encontrado.';
            }
        }
        return $this->rows[0]??null;
    }
    public function set(){
        $this->query = "INSERT INTO perros(nombre, peso, raza)
        VALUES(:nombre, :peso, :raza)";
        
        //$this->parametros['id']= $id;
        $this->parametros['nombre']= $this->nombre;
        $this->parametros['peso']= $this->peso;
        $this->parametros['raza']= $this->raza;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Perro añadido.';
    }
    
    public function delete(){}
    public function edit(){}
}
