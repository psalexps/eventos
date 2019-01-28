<?php

include_once 'indexController.php';

class localController extends indexController{
    private $conectar;
    private $conexion;

    public function __construct(){
        require_once __DIR__ . '/../model/clases/Conexion.php';
        require_once __DIR__ . '/../model/clases/Local.php';

        $this->conectar = new Conexion();
        $this->conexion = $this->conectar->conexion();
    }

    public function index(){

        $local = new Local($this->conexion);

        $locales = $local->getAll();

        $this->render('localView',array(
            "locales" => $locales
        ));
    }
}
