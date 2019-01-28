<?php

include_once 'indexController.php';

class eventoController extends indexController {
    private $conectar;
    private $conexion;

    public function __construct(){
        require_once __DIR__.'/../model/clases/Conexion.php';
        require_once __DIR__.'/../model/clases/Evento.php';

        $this->conectar = new Conexion();
        $this->conexion = $this->conectar->conexion();
    }

    public function crearEvento(){

        if (isset($_POST['nombreEvento'])){

            $evento = new Evento($this->conexion);
            $evento->setNombre($_POST['nombreEvento']);
            $evento->setTipo($_POST['tipoEvento']);
            $evento->setFecha($_POST['fechaEvento']);
            $evento->setDescripcion($_POST['descripcionEvento']);
            $evento->setLocal($_POST['lugarEvento']);
            $evento->insert();

        }

        header('Location: index.php');
    }

    public function index(){

        $evento = new Evento($this->conexion);

        $eventos = $evento->getAll();

        $this->render('indexView',array(
            "eventos" => $eventos
        ));
    }

}