<?php
namespace App\Controllers;

// Definimos la clase que extiende de base controller
class IndexController extends BaseController{
    public function IndexAction()
    {
        $data = array('message' => 'Hola Mundo');
        $this->renderHTML('../app/views/index_view.php', $data);
    }

    public function MessajeAction($request){

        $frase = explode("/", $request);
        $nombre = end($frase);

        $data = array('saludo' => $nombre);
        $this->renderHTML("../app/views/saludos_view.php",$data);
    }

    public function NumberParAction(){
        $this->renderHTML("../app/views/numeros_view.php");
    }

    public function NumberParesAction($request){
        $ruta = explode("/", $request);
        $numero = end($ruta);
        $data = array('pares' => $numero);
        $this->renderHTML("../app/views/numeros_pares_view.php", $data);
    }
}



?>